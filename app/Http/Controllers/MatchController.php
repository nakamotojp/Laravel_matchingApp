<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\Profile;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;






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

        $chats = Chat::whereIn('from_user_id',[$id,Auth::user()->id])->whereIn('to_user_id',[$id,Auth::user()->id])->get();

        $user = User::where('id',$id)->first();

        return view('pages.match.chat',compact('chats','user'));
    }

    public function sendChat(Request $request){

        $toUserId = $request->input('to_user_id');

        Chat::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $toUserId,
            'chat' => $request->input('message'),
        ]);

        $Chats = Chat::whereIn('from_user_id',[$toUserId,Auth::user()->id])->whereIn('to_user_id',[$toUserId,Auth::user()->id])->get();

        return response()->json($Chats);
    }
}
