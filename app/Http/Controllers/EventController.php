<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Liked;
use App\Models\Reserved;
use Illuminate\Support\Facades\Auth;
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
        $event = Event::where('id',$id)->first();

        return view('pages.events.detail',compact('event'));
    }

    public function reserved(){

        $ids = Reserved::where('user_id',Auth::user()->id)->where('reserve',true)->pluck('event_id');

        $reserved = [];

        for($i=0; $i<count($ids); $i++){
            $reserved[] = Event::find($ids[$i]);
        }

        return view('pages.events.reserved', compact('reserved'));
    }

    public function liked(){

        $ids = Liked::where('user_id',Auth::user()->id)->where('like',true)->pluck('event_id');

        $liked = [];

        for($i=0; $i<count($ids); $i++){
            $liked[] = Event::find($ids[$i]);
        }

        return view('pages.events.liked', compact('liked'));
    }


}
