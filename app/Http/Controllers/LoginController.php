<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login-page');
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
            return redirect('/fitur-edukasi-admin');
            elseif(Auth::user()->roles_id == '2')
            return redirect('/fitur-edukasi-user');
            elseif(Auth::user()->roles_id == '3')
            return redirect('/fitur-edukasi-gov');
        }
        else {
            return redirect('/login-page')->with('failed', 'Username atau Password Salah!');
        }
    }
}
