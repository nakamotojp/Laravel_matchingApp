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
        return view('pages.user.index',['user' => $user]);
    }

    public function showProfile()
    {
        $exists = Profile::where('user_id', Auth::user()->id)->exists();
        $user = User::where('id', Auth::user()->id)->first();

        if($exists){
            $profile = Profile::where('user_id', Auth::user()->id)->first();
            return view('pages.user.showProfile', compact('exists','profile','user'));
        }else{
            return view('pages.user.postProfile', compact('exists','user'));
        }

    }

    public function postProfile()
    {
            return view('pages.user.postProfile');
    }

    public function storeProfile(Request $request)
    {
        Profile::create([
            'user_id' => Auth::user()->id,
            'age' => $request->input('age'),
            'income' => $request->input('income'),
            'introduce' => $request->input('introduce'),
        ]);

        return redirect(url('/profile'))->with('flash_message', 'posting successful！');
    }

    public function showEditProfile() {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('pages.user.editProfile')->with('profile', $profile);

    }

    public function updateEditProfile(Request $request) {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $profile->age = $request->input('age');
        $profile->income = $request->input('income');
        $profile->introduce = $request->input('introduce');
        $profile->save();

        return redirect(url('/profile'))->with('flash_message', 'updating successful！');

    }

    public function notice()
    {
        return view('pages.user.notice');
    }
}

