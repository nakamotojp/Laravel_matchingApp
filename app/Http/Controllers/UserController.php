<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\User;
use App\Models\Profile;
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

    public function showProfile()
    {
        return view('pages.user.profile');
    }

    public function storeProfile(Request $request)
    {
        Profile::create([
            'user_id' => Auth::user()->id,
            'age' => $request->input('age'),
            'income' => $request->input('income'),
            'introduce' => $request->input('introduce'),
        ]);

        return redirect(url('/users'));
    }
}

