<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konsultasi; 
use App\Models\BalasanKonsultasi;

class C_Konsultasi extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $konsultasi = Konsultasi::get();
        
        return view('konsultasi.V_konsultasi', compact('konsultasi', 'currentuser'));
    }
}
