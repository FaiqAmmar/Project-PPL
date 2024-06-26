<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
use App\Models\RatingEdukasi;

class C_JenisEdukasi extends Controller
{
    public function dataJenisEdukasi()
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::orderBy('created_at', 'desc')->first(); //untuk menampilkan jenis yang terbaru
        $materi = MateriEdukasi::where('jenis_edukasi_id', $first?->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_edukasi_id', $materi->jenis_edukasi_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_edukasi_id', $materi->jenis_edukasi_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('materi_edukasi_id', $sub?->id)->orderBy('created_at', 'asc')->first();
            $firstRating = RatingEdukasi::where('sub_materi_edukasi_id', $firstSub?->id)->count('id');
            $avgRating = RatingEdukasi::where('sub_materi_edukasi_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;    
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        // dd($materi);
        return view('edukasi.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }
    public function edit(Request $request, $id)
    {
        $currentJenisEdukasi = JenisEdukasi::find($id);

        $validatedJenisEdukasi = $request->validate([
            'judul_modul' => 'required',
        ]);
        $currentJenisEdukasi->update($validatedJenisEdukasi);

        return redirect()->back()->with('success', 'Data Jenis Edukasi Berhasil Diubah!');
    }
    public function tambahData(Request $request)
    {
        $Jenis = $request->validate([
            'judul_modul' => 'required'
        ]);
        $newJenis = JenisEdukasi::create($Jenis);

        return redirect()->back()->with('success', 'Data Jenis Edukasi Berhasil Ditambah!');
    }
}