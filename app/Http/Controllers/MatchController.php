<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class MatchController extends Controller
{

    public function index()
    {

        $likedUserIds = Swipe::where('to_user_id', Auth::user()->id)
        ->where('is_like', true)->pluck('from_user_id');

        $machedUsers = Swipe::where('from_user_id', Auth::user()->id)
        ->whereIn('to_user_id', $likedUserIds)->where('is_like', true)
        ->with('toUser')->get();


        return view('pages.match.index', ['machedUsers' => $machedUsers]);
    }
}
