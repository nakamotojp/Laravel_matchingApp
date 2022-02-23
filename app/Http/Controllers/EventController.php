<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd($request);
        return view('pages.events.showHold');
    }

}
