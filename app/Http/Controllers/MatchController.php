<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\Profile;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




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

        DB::beginTransaction();

        try{

        Chat::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $toUserId,
            'chat' => $request->input('message'),
        ]);

        DB::commit();

        }catch (\Exception $exception) {
        DB::rollback();

        $error = 'systemerror. please try again.';
        return response()->json($error);
        // jsに処理書いてない。アラート出す予定

        }

        $Chats = Chat::whereIn('from_user_id',[$toUserId,Auth::user()->id])->whereIn('to_user_id',[$toUserId,Auth::user()->id])->get();

        return response()->json($Chats);
    }
}
