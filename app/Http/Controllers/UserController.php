<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index()
    {
        $swiped = Swipe::where('from_user_id', Auth::user()->id)->get()->pluck('to_user_id');

        $user = User::where('id','<>',Auth::user()->id)->whereNotIn('id', $swiped)->first();
        return view('pages.user.index',[
            'user' => $user
        ]);
    }
}

