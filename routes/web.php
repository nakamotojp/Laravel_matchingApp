<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\MatchController;

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

    Route::post('/swipes', [SwipeController::class, 'store'])->name('swipes.store');
    Route::get('/mathes', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.showProfile');
    Route::post('/postProfile', [UserController::class, 'storeProfile'])->name('users.storeProfile');
    Route::get('/editProfile', [UserController::class, 'showEditProfile'])->name('users.editProfile');
    Route::post('/editProfile', [UserController::class, 'updateEditProfile'])->name('users.updateProfile');
});
