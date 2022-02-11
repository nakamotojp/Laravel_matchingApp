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
        return view('pages.match.index');
    }
}
