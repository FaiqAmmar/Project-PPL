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
    public function profil()
    {
        $id = Auth::user()->id;
        $roles_id = Auth::user()->roles_id;
        $currentuser = User::find($id);

        return view("profil.V_profil", compact('currentuser'));
    }
    public function edit($id)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();

        return view('profil.V_profil-edit', compact('currentuser', "provinces","cities","districts"));
    }
    public function setFormEdit(Request $request)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        
        $messages = [
            'nama.required' => 'nama isi',
            'email.required'=> 'email isi',
            'password'=> 'pass isi',
            'nomor_handphone.required' => 'hp isi',
            'gender.required'=> 'gender isi',
            'alamat.required'=> 'alamat isi',
            'province_code.required'=> 'provinsi isi',
            'city_code.required'=> 'kota isi',
            'district_code.required'=> 'kec isi',
        ];
        $validatedProfile= $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'nomor_handphone' => 'required|min:12',
            'gender'=> 'required',
            'alamat'=> 'required',
            'province_code'=> 'required',
            'city_code'=> 'required',
            'district_code'=> 'required',
            'password' => 'nullable|min:8',
        ], $messages);

        if ($request->filled('password')) {
            $validatedProfile['password'] = Hash::make($request->password);
        } else {
            unset($validatedProfile['password']);
        }
        
        $currentuser->update($validatedProfile);
        return redirect('/profil')->with('success', 'Profil Anda Berhasil Diubah!');
    }

    public function setFormPhoto(Request $request)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        $validatedProfile= $request->validate([
            'foto_profil' => 'nullable|mimes:png,jpg,jpeg',
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
        
        $currentuser->update($validatedProfile);

        return redirect('/profil')->with('success', 'Foto Profil Berhasil Diubah!');
    }
    public function akunPengguna()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $user = User::where('roles_id', 2)->get();

        return view('profil.V_lihat-user', compact('currentuser','user'));
    }
    public function akunPemerintah()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $gov = User::where('roles_id', 3)->get();

        return view('profil.V_lihat-gov', compact('currentuser', 'gov'));
    }
}
