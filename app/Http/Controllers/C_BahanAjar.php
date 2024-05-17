<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BahanAjar;
use App\Models\User;

class C_BahanAjar extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        if ($currentuser->roles_id == 1) {
            return view('bahan-ajar.V_bahan-ajar-detail', compact('currentuser'));
        } else {
            return view('bahan-ajar.V_bahan-ajar', compact('currentuser'));
        }
    }
    public function nambah_bahan_ajar(Request $request)
    {
        $validatedBahanAjar = $request->validate([
            'ajuan' => 'required',
            'user_id' => 'required',
        ]);
        
        BahanAjar::create([
            'ajuan' => $validatedBahanAjar['ajuan'],
            'user_id' => $validatedBahanAjar['user_id'],
        ]);
        return redirect('/bahan_ajar')-with('success', 'Bahan Ajar Berhasil Ditambahkan!');

    }
}
