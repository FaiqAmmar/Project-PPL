<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Login extends Controller
{
    function index()
    {
        return view('V_login-page');
    }

    /**
     * @Route("/login", name="login-page", methods={"GET", "POST"})
     */
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->roles_id == '1')
            return redirect('/edukasi');
            elseif(Auth::user()->roles_id == '2')
            return redirect('/edukasi');
            elseif(Auth::user()->roles_id == '3')
            return redirect('/edukasi');
        }
        else {
            return redirect('/login')->with('failed', 'Username atau Password Salah!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
    