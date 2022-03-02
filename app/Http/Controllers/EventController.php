<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\User;
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
        $fileName = $request->file('image')->getClientOriginalName();
        Storage::putFileAs('public/images', $request->file('image'), $fileName);
        $fullFilePath = '/storage/images/'.$fileName;

        Event::create([
            'hold_user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'datetime' => $request->input('datetime'),
            'hour' => $request->input('hour'),
            'number' => $request->input('number'),
            'type' => $request->input('type'),
            'img_url' => $fullFilePath,
            'introduce' => $request->input('content'),
        ]);

        return redirect(url('/events/list'))->with('flash_message', 'holding successful！');

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
        $user = Event::find($id)->user()->first();

        Reserve::create([
            'user_id' => $user->id,
            'event_id' => $id,
            'step' => '1'
        ]);

        return redirect(url('/events'))->with('flash_message', 'applied to '.$user->name.'!');

    }

    public function withdraw($id)
    {
        $user = Event::find($id)->user()->first();

        DB::table('reserves')->where('user_id',Auth::user()->id)->where('event_id',$id)->delete();

        return redirect(url('/events'))->with('flash_message', 'withdraw application!');

    }

    public function decline($id)
    {
        $user = Event::find($id)->user()->first();

        DB::table('reserves')->where('user_id',Auth::user()->id)->where('event_id',$id)->delete();

        return redirect(url('/events'))->with('flash_message', 'decline participation!');

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
}
