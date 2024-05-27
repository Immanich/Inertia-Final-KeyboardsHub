<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\Auth;

class UserController extends Controller
{
    public function create() {
        return inertia('Account/CreateAccount');
    }

    // public function loginhub() {
    //     return Inertia::render('Account/LoginHub');
    // }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

         if(User::attempt($credentials)) {
            return redirect()->intended('home');
         } 

         return back()->withErrors([
            'email', 'password'=>'The provided credentials do not match our records.'
            // 'password'=>'The provided credentials do not match our records.'
         ]);
    }

    public function store(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'region' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'region' => $request->region,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
        ]);
        
        return redirect('/loginhub')->with('success', 'Welcome to the hub!');
    }
}
