<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::inertia('/', 'index');
Route::inertia('/sign-up-page', 'SignUp');
Route::middleware('guest')->group(function () {
    Route::post('/sign-in', [UserController::class, 'signIn']);
    Route::post('/sign-up', [UserController::class, 'signUp']);
});
