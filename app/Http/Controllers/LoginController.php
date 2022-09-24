<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('users');
        }
        return view('login.index');
    }

    public function store(Request $request) 
    {

        if (Auth::check()) {
            return redirect()->intended('users');
        }

        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            return redirect()->intended('users');
        }

        return redirect()->intended('login')->withErrors(['errors'=>'Login falhou']);
    }

    public function logout(Request $request)
    {        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
