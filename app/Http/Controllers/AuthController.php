<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => [ 'required', 'alpha_dash' ],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $newUser = User::create($credentials);
        $newUser->password = Hash::make($newUser->password);

        $newUser->save();

        Auth::login($newUser);

        if (Auth::check()) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => [ 'boolean' ],
        ]);

        if (Auth::attempt([ 
            'email' => $credentials['email'], 
            'password' => $credentials['password'],
        ], $credentials['remember_me'] ?? false)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
