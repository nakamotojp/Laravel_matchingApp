<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.showProfile');
    Route::post('/postProfile', [UserController::class, 'storeProfile'])->name('users.storeProfile');
    Route::get('/editProfile', [UserController::class, 'showEditProfile'])->name('users.editProfile');
    Route::post('/editProfile', [UserController::class, 'updateEditProfile'])->name('users.updateProfile');

    Route::post('/swipes', [SwipeController::class, 'store'])->name('swipes.store');

    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/matchuser/{id}', [MatchController::class, 'showMatchuser'])->name('matches.user');
    Route::get('/chat/{id}', [MatchController::class, 'showChat'])->name('matches.chat');
    Route::post('/chat', [MatchController::class, 'sendChat'])->name('chat');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/hold', [EventController::class, 'showHold'])->name('events.hold');
    Route::post('/events/post', [EventController::class, 'post'])->name('events.post');
    Route::get('/events/list', [EventController::class, 'list'])->name('events.list');
    Route::get('/events/list/{id}', [EventController::class, 'showDetail'])->name('events.detail');



});
