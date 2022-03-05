<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Like;
use App\Models\Notice;
use App\Models\Reserve;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        return view('pages.events.index');
    }

    public function showHold()
    {
        return view('pages.events.showHold');
    }


    public function post(Request $request)
    {
        $this->holdValidate($request);

        $fileName = $request->file('image')->getClientOriginalName();
        Storage::putFileAs('public/images', $request->file('image'), $fileName);
        $fullFilePath = '/storage/images/'.$fileName;

        DB::beginTransaction();

        try{
        Event::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'datetime' => $request->input('datetime'),
            'hour' => $request->input('hour'),
            'number' => $request->input('number'),
            'type' => $request->input('type'),
            'img_url' => $fullFilePath,
            'introduce' => $request->input('introduce'),
        ]);

        DB::commit();

        }catch (\Exception $exception) {
        DB::rollback();
        return redirect('/events/hold')->with('flash_message', 'sysytem error. please try again');
        }

        return redirect(url('/events/list'))->with('flash_message', 'holding successful！');

    }

    public function delete($id)
    {
        DB::table('events')->where('id',$id)->delete();
        return redirect(url('/events'))->with('flash_message', 'deleting successful！');
    }


    public function list()
    {
        $lists = Event::orderBy('created_at', 'desc')->get();
        return view('pages.events.list',compact('lists'));
    }

    public function showDetail($id)
    {
        $event = Event::withCount('likes')->withCount('reserves')->where('id',$id)->first();

        return view('pages.events.detail',compact('event'));
    }


    public function reserved(){

        $ids = Reserve::where('user_id',Auth::user()->id)->pluck('event_id');

        $reserved = [];

        for($i=0; $i<count($ids); $i++){
            $reserved[] = Event::find($ids[$i]);
        }

        return view('pages.events.reserved', compact('reserved'));
    }

    public function apply($id)
    {
        $event = Event::find($id);
        $from_user = $event->user()->first();

        $user_id = Auth::user()->id;

        $message = config('message.notice_message');
        $content = config('message.notice_content');

        DB::beginTransaction();

        try{

        Reserve::create([
            'user_id' => $user_id,
            'event_id' => $id,
            'step' => '1',
        ]);

        Notice::create([
            'from_user_id' => $user_id,
            'to_user_id' => $from_user->id,
            'message' => $message,
            'content' => $content,
            'check' => 0,
            'event_id' => $id,
        ]);
        DB::commit();

        }catch (\Exception $exception) {
        DB::rollback();
        return redirect('/events')->with('flash_message', 'sysytem error. please try again');
        }

        return redirect(url('/events'))->with('flash_message', 'applied to '.$from_user->name.'!');

    }

    public function withdraw($id)
    {
        $user = Event::find($id)->user()->first();

        DB::table('reserves')->where('user_id',Auth::user()->id)->where('event_id',$id)->delete();

        return redirect(url('/events/detail',$id))->with('flash_message', 'withdraw application!');

    }

    public function decline($id)
    {
        $user = Event::find($id)->user()->first();

        DB::table('reserves')->where('user_id',Auth::user()->id)->where('event_id',$id)->delete();

        return redirect(url('/events/detail',$id))->with('flash_message', 'decline participation!');

    }

    public function showHeld(){

        $reserved = Event::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.events.reserved', compact('reserved'));

    }

    public function showSearch()
    {
        return view('pages.events.showSearch');
    }




    public function liked(){

        $ids = Like::where('user_id',Auth::user()->id)->pluck('event_id');

        $liked = [];

        for($i=0; $i<count($ids); $i++){
            $liked[] = Event::find($ids[$i]);
        }

        return view('pages.events.liked', compact('liked'));
    }


    public function like (Request $request)
    {
        $user_id = Auth::user()->id;
        $event_id = $request->event_id;

        $boolean = Like::where('user_id', $user_id)->where('event_id',$event_id)->exists();

        if($boolean){

            DB::table('likes')->where('user_id', $user_id)->where('event_id',$event_id)->delete();

            $count = Like::where('event_id',$event_id)->count();

            $data = [
                'count' => $count
            ];

            return response()->json($data);

        }else{

            Like::create([
                'user_id' => $user_id,
                'event_id' => $event_id
            ]);

            $count = Like::where('event_id',$event_id)->count();

            $data = [
                'count' => $count
            ];

            return response()->json($data);
        }
    }


    public function holdValidate($request){

        $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'address' => 'required|max:255',
            'datetime' => 'required|after:"now"',
            'hour' => 'nullable|max:255',
            'number' => 'required|regex:/^[0-9]+$/i',
            'type' => 'required|regex:/^[0-9]+$/i',
            'introduce' => 'required|max:2000',
            'img_url' => 'nullable|max:255',
        ],[
            'name.required' => 'name is required.',
            'title.required' => 'title is required'
        ]);
        // ↑つまらないので飛ばす
    }

// タスクスケジューラ調整用
    // public function batch(){

        // $message = config('message.yesterday_message');
        // $content = config('message.yesterday_content');

    //     $carbon = new Carbon();
    //     $carbon = $carbon->addDays(1);

    //     $ids = Reserve::where('step',2)->pluck('id');

    //    for($i = 0; $i<count($ids); $i++){

    //         $reserve = Reserve::find($ids[$i]);

    //         $event = Event::find($reserve->event_id);

    //         if($event->datetime <= $carbon){

    //             Notice::create([
    //                 'from_user_id' => $event->user_id,
    //                 'to_user_id' => $reserve->user_id,
    //                 'message' => $message,
    //                 'content' => $content,
    //                 'check' => 0,
    //                 'event_id' => $event->id,
    //             ]);
    //         }
    //    }
    // }
}
