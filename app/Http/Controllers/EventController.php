<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

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
        // dd($request);
        Event::create([
            'hold_user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            // 'datetime' => $request->input('datetime'),
            'hour' => $request->input('hour'),
            'number' => $request->input('number'),
            'type' => $request->input('type'),
            // 'img_url' => $request->input(''),
            'introduce' => $request->input('content'),
        ]);


        return redirect(url('/events'))->with('flash_message', 'holding successful！');

    }

}
