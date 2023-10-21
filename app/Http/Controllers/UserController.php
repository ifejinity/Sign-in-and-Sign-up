<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignIn;
use App\Http\Requests\SignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // sign in
    public function signIn(SignIn $request) {
        $credentials = $request->only(['username', 'password']);
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        }   
    }
    // sign up
    public function signUp(SignUp $request) {
        $userData = $request->only(['first_name', 'last_name', 'username', 'email']);
        $hashedPassword = Hash::make($request->password);
        $userData = Arr::add($userData, 'password', $hashedPassword);
        User::create($userData);
    }
}
