<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konsultasi; 
use App\Models\BalasanKonsultasi;

class C_BalasanKonsultasi extends Controller
{
    public function index(Request $request, $id)
    {
        $konsultasi = Konsultasi::where("id", $id)->first();
        $balasan = BalasanKonsultasi::where("konsultasi_id", $id)->orderBy('created_at', 'desc')->get(); //untuk menampilkan semua jenis di header                
        $first = BalasanKonsultasi::orderBy('created_at', 'desc')->first(); //untuk menampilkan jenis yang terbaru

        return view('konsultasi.V_balasan', compact('konsultasi','balasan', 'first'));
    }
    public function store(Request $Request)
    {
        $user = Auth::user()->id;

        $validatedBalasan = $Request->validate([
            'balasan' => 'required',
            'konsultasi_id'=> 'required',
        ]);
        $validatedBalasan['user_id'] = $user;
        $newBalasan = BalasanKonsultasi::create($validatedBalasan);

        return redirect()->route('balasan', ['id'=>$validatedBalasan['konsultasi_id']])->with('success','');
    }
}
