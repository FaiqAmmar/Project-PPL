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
        $konsultasi = Konsultasi::orderBy('created_at', 'desc')->get(); //untuk menampilkan semua jenis di header 
        $balasanArray = [];
        foreach ($konsultasi as $item) {
            $balasan = BalasanKonsultasi::where('konsultasi_id', $item->id)
                                        ->orderBy('created_at', 'asc')
                                        ->first(); // Fetch the latest BalasanKonsultasi for each Konsultasi
        
            $balasanArray[] = [
                'konsultasi' => $item,
                'latest_balasan' => $balasan,
            ];
        }              
        if ($balasan != null) {
            $firstbalasan = BalasanKonsultasi::where('konsultasi_id', $balasan->konsultasi_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
        } else {
            $firstbalasan = null;
        }
        return view('konsultasi.V_konsultasi', compact('konsultasi', 'balasanArray', 'balasan', 'firstbalasan'));
    }
    public function store(Request $Request)
    {
        $user = Auth::user()->id;

        $validatedKonsul = $Request->validate([
            'konsultasi' => 'required',
        ]);
        $validatedKonsul['user_id'] = $user;
        $newKonsul = Konsultasi::create($validatedKonsul);

        return redirect()->back()->with('success','');
    }
}
