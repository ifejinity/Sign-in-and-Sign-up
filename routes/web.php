<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// guest
Route::middleware('guest')->group(function () {
    Route::inertia('/', 'index')->name('signIn');
    Route::inertia('/sign-up-page', 'SignUp')->name('signUp');
    Route::post('/sign-in', [UserController::class, 'signIn']);
    Route::post('/sign-up', [UserController::class, 'signUp']);
});
// auth
Route::middleware('auth')->group(function() {
    Route::inertia('/home', 'User/Home')->name('home');
    Route::post('/sign-out', [UserController::class, 'signOut']);
});
