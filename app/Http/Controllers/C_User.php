<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vermaysha\Wilayah\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Vermaysha\Wilayah\Models\District;
use Vermaysha\Wilayah\Models\Province;
use Illuminate\Support\Facades\Storage;

class C_User extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $roles_id = Auth::user()->roles_id;
        $currentuser = User::find($id);

        return view("profil.V_profil", compact('currentuser'));
    }
    public function edit_profil($id)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();

        return view('profil.V_profil-edit', compact('currentuser', "provinces","cities","districts"));
    }
    public function update_profil(Request $request)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        
        $validatedProfile= $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'nomor_handphone' => 'required',
            'gender'=> 'required',
            'alamat'=> 'required',
            'province_code'=> 'required',
            'city_code'=> 'required',
            'district_code'=> 'required',
            'foto_profil' => 'mimes:png,jpg,jpeg',
            'password' => 'min:8',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($validatedProfile['foto_profil'] !== null) {
            Storage::delete('public/fotoprofil/' . $validatedProfile['foto_profil']);
            }
            $file = $request->file('foto_profil');
            $extension = $file->getClientOriginalExtension();
            $nama_file = $currentuser->id.'.'.$extension;
            $file->storeAs('public/fotoprofil', $nama_file);
            $validatedProfile['foto_profil'] = $nama_file;
        }

        if ($request->filled('password')) {
            $validatedProfile['password'] = Hash::make($request->password);
        } else {
            unset($validatedProfile['password']);
        }
        
        $currentuser->update($validatedProfile);
        return redirect('/profil')->with('success', 'Profil Anda Berhasil Diubah!');
    }
    public function lihat_user()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $user = User::where('roles_id', 2)->get();

        return view('profil.V_lihat-user', compact('currentuser','user'));
    }
    public function lihat_gov()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $gov = User::where('roles_id', 3)->get();

        return view('profil.V_lihat-gov', compact('currentuser', 'gov'));
    }
}
