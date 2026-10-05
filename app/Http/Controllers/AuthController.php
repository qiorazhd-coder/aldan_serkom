<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {

            $request->session()->regenerate();

            return redirect()->route('admin.index');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');

    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
    }

}
