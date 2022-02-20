<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\Profile;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;





class MatchController extends Controller
{

    public function index()
    {

        $likedUserIds = Swipe::where('to_user_id', Auth::user()->id)
        ->where('is_like', true)->pluck('from_user_id');

        $matchedUsers = Swipe::where('from_user_id', Auth::user()->id)
        ->whereIn('to_user_id', $likedUserIds)->where('is_like', true)
        ->with('toUser')->get();


        return view('pages.match.index', ['matchedUsers' => $matchedUsers]);
    }

    public function showMatchUser($id){

        $exists = Profile::where('user_id',$id)->exists();
        $user = User::where('id', $id)->first();

        if($exists){
            $matchedUser = Profile::where('user_id',$id)->first();

        return view('pages.match.showMatchUser', compact('exists','matchedUser','user'));
        }else{
            return view('pages.match.showMatchUser',compact('exists','user'));
        }

    }

    public function showChat($id){

        $user = User::where('id', $id)->first();

        $authChats = Chat::where('from_user_id',Auth::user()->id)->where('to_user_id',$id)->get();
        $userChats = chat::where('to_user_id',Auth::user()->id)->where('from_user_id',$id)->get();

        return view('pages.match.chat',compact('authChats','userChats','user'));
    }

    public function sendChat(Request $request){

        $toUserId = $request->input('to_user_id');
        $user = User::where('id', $toUserId)->first();

        Chat::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $toUserId,
            'chat' => $request->input('message'),
        ]);

        $authChats = Chat::where('from_user_id',Auth::user()->id)->where('to_user_id',$toUserId)->get();
        $userChats = chat::where('to_user_id',Auth::user()->id)->where('from_user_id',$toUserId)->get();

        // return view('pages.match.chat',compact('authChats','userChats','user'));
        return response()->json([
            'authChats' => $authChats,
            'userChats' => $userChats,
            'user' => $user
         ]);
    }
}
