<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Swipe;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        if(!empty(session('flash_message'))){

            $matchuser = User::find(session('matchId'));
            return view('pages.user.index',['matchuser' => $matchuser]);
            
        }
        $swiped = Swipe::where('from_user_id', Auth::user()->id)->get()->pluck('to_user_id');

        $user = User::where('id','<>',Auth::user()->id)->whereNotIn('id', $swiped)->first();
        return view('pages.user.index',['user' => $user]);
    }

    public function showProfile()
    {
        $exists = Profile::where('user_id', Auth::user()->id)->exists();
        $user = User::where('id', Auth::user()->id)->first();

        if($exists){
            $profile = Profile::where('user_id', Auth::user()->id)->first();
            return view('pages.user.showProfile', compact('exists','profile','user'));
        }else{
            return view('pages.user.postProfile', compact('exists','user'));
        }

    }

    public function postProfile()
    {
            return view('pages.user.postProfile');
    }

    public function storeProfile(Request $request)
    {
       $this->profileValidate($request);

       DB::beginTransaction();

       try{

        Profile::create([
            'user_id' => Auth::user()->id,
            'age' => $request->input('age'),
            'income' => $request->input('income'),
            'introduce' => $request->input('introduce'),
        ]);
        DB::commit();

    }catch (\Exception $exception) {
    DB::rollback();
    return redirect('/events/hold')->with('flash_message', 'sysytem error. please try again');
    }

        return redirect(url('/profile'))->with('flash_message', 'posting successful！');
    }

    public function showEditProfile() {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('pages.user.editProfile')->with('profile', $profile);

    }

    public function updateEditProfile(Request $request) {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $profile->age = $request->input('age');
        $profile->income = $request->input('income');
        $profile->introduce = $request->input('introduce');
        $profile->save();

        return redirect(url('/profile'))->with('flash_message', 'updating successful！');

    }

    public function notice()
    {
        $notices = Notice::where('to_user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $check = Notice::where('to_user_id',Auth::user()->id)->where('check',0)->exists();

        if($check){
            // メッセージ追加したい
            return view('pages.user.notice',compact('notices'));
        }else{
            return view('pages.user.notice',compact('notices'));
        }
    }

    public function detailNotice($id)
    {
        DB::table('notices')->where('id', $id)->update(['check' => 1]);
        $notice = Notice::find($id);
        return view('pages.user.detailNotice',compact('notice'));
    }

    public function yesEvent($id)
    {
       $notice = Notice::find($id);

       DB::table('reserves')->where('user_id',$notice->from_user_id)->where('event_id',$notice->event_id)->update(['step' => 2]);

       $message = config('message.yesnotice_message');
        $content = config('message.yesnotice_content');

        Notice::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $notice->from_user_id,
            'message' => $message,
            'content' => $content,
            'check' => 0,
            'event_id' => $notice->event_id,
        ]);
        return redirect(url('/notice'))->with('flash_message', 'Approved！');
    }

    public function noEvent($id)
    {
        $notice = Notice::find($id);

        DB::table('reserves')->where('user_id',$notice->from_user_id)->where('event_id',$notice->event_id)->update(['step' => 2]);

        $message = config('message.nonotice_message');
         $content = config('message.nonotice_content');

         Notice::create([
             'from_user_id' => Auth::user()->id,
             'to_user_id' => $notice->to_user_id,
             'message' => $message,
             'content' => $content,
             'check' => 0,
             'event_id' => $notice->event_id,
         ]);

        DB::table('reserves')->where('user_id',$notice->from_user_id)->where('event_id',$notice->event_id)->update(['step' => 3]);

        return redirect(url('/notice'))->with('flash_message', 'Declined！');
    }

    public function profileValidate($request)
    {
        $request->validate([
            'age' => 'required|regex:/^[0-9]+$/i',
            'income' => 'required|regex:/^[0-9]+$/i',
            'introduce' => 'required|max:2000',
            'datetime' => 'required|after:"now"',
        ],[
            'age.required' => 'name is required.',
            'introduce.required' => 'title is required'
        ]);
    }
}

