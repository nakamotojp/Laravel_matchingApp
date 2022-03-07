<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Swipe;


class SwipeController extends Controller
{

    public function store(Request $request)
    {
        Swipe::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $request->input('to_user_id'),
            'is_like' => $request->input('is_like'),
        ]);

        $isMatch = $request->input('is_like') &&
        Swipe::where('from_user_id', $request->input('to_user_id'))
        ->where('to_user_id', Auth::user()->id)
        ->where('is_like', true)
        ->exists();

        if($isMatch){

            session(['matchId' => $request->input('to_user_id')]);

            return redirect(route('users.index'))->with('flash_message','Matching successful！');
        }

        return redirect(route('users.index'));
    }
}

