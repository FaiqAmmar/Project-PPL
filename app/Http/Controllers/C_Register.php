<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class C_Register extends Controller
{
    public function user()
    {   
        $roles_id = 2;
        return view("auth/V_register", compact("roles_id"));
    }
    public function gov()
    {
        $roles_id = 3;
        return view("auth/V_register", compact("roles_id"));
    }
    public function register_user(Request $request)
    {
        $validatedRegister = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            'nomor_handphone' => 'required',
            'gender'=> 'required',
            'alamat'=> 'required',
        ]);
        $validatedRegister['passsword'] = bcrypt($validatedRegister['password']);
        $validatedRegister['roles_id'] = '2';
        User::create($validatedRegister);

        $roles_id = 2;
        return view('auth/V_login', compact('roles_id'));
    }
    public function register_gov(Request $request)
    {
        $validatedRegister = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            'nomor_handphone' => 'required',
            'gender'=> 'required',
            'alamat'=> 'required',
        ]);
        $validatedRegister['passsword'] = bcrypt($validatedRegister['password']);
        $validatedRegister['roles_id'] = '3';
        User::create($validatedRegister);

        $roles_id = 3;
        return view('auth/V_login', compact('roles_id'));
    }
}