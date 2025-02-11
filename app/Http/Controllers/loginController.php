<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/employee');
        }

        return back()->withErrors([
            'email' => 'email and password Wrong',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('login')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.show');
    }

}
