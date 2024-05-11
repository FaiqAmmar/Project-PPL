<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vermaysha\Wilayah\Models\Province;
use Vermaysha\Wilayah\Models\City;
use Vermaysha\Wilayah\Models\District;


class C_Register extends Controller
{
    public function user()
    {   
        $roles_id = 2;
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        return view("auth/V_register", compact("roles_id", "provinces","cities","districts"));
    }
    public function gov()
    {
        $roles_id = 3;
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        return view("auth/V_register", compact("roles_id", "provinces","cities","districts"));
    }
    public function register_user(Request $request)
    {
        $messages = [
            'nama.required' => 'nama isi',
            'email.required'=> 'email isi',
            'password.required'=> 'pass isi',
            'nomor_handphone.required' => 'hp isi',
            'gender.required'=> 'gender isi',
            'alamat.required'=> 'alamat isi',
            'province_code.required'=> 'provinsi isi',
            'city_code.required'=> 'kota isi',
            'district_code.required'=> 'kec isi',
        ];
        $validatedRegister = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            'nomor_handphone' => 'required',
            'gender'=> 'required',
            'alamat'=> 'required',
            'province_code'=> 'required',
            'city_code'=> 'required',
            'district_code'=> 'required',
        ]);
        $validatedRegister['password'] = bcrypt($validatedRegister['password']);
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
            'province_code'=> 'required',
            'city_code'=> 'required',
            'district_code'=> 'required',
        ]);
        $validatedRegister['password'] = bcrypt($validatedRegister['password']);
        $validatedRegister['roles_id'] = '3';
        User::create($validatedRegister);

        $roles_id = 3;
        return view('auth/V_login', compact('roles_id'));
    }
}