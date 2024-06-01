<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Login extends Controller
{
    function masuk()
    {
        return view('auth.V_login');
    }

    /**
     * @Route("/login", name="login-page", methods={"GET", "POST"})
     */
    public function cekData(Request $request) 
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
            return redirect('/edukasi/2/1');
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
    