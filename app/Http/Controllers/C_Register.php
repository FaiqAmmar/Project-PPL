<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vermaysha\Wilayah\Models\Province;
use Vermaysha\Wilayah\Models\City;
use Vermaysha\Wilayah\Models\District;


class C_Register extends Controller
{
    public function Daftar() {
        return view("auth.V_register-role");
    }
    public function PeranUser()
    {   
        $roles_id = 2;
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        return view("auth/V_register", compact("roles_id", "provinces","cities","districts"));
    }
    public function PeranGov()
    {
        $roles_id = 3;
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        return view("auth/V_register", compact("roles_id", "provinces","cities","districts"));
    }
    public function daftarUser(Request $request)
    {
        $validatedRegister = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'password'=> 'required|min:8',
            'nomor_handphone' => 'required|min:12',
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
    public function daftarGov(Request $request)
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