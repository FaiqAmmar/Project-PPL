<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
use App\Models\RatingEdukasi;



class C_MateriEdukasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::where('id', $id)->first(); //untuk menampilkan jenis yang terbaru
        $materi = MateriEdukasi::where('jenis_edukasi_id', $first?->id)->first(); //ntuk mengambil jenis yang paling baru
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
        // dd($firstSub->judul);
        return view('edukasi.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Jenis = $request->validate([
            'judul_materi' => 'required',
            'jenis_edukasi_id' => 'required'
        ]);
        // $test = SubMateriEdukasi::all();
        // dd($test);

        MateriEdukasi::create($Jenis);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $materi_edukasi_id, string $sub_materi_edukasi_id)
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::where('id', $materi_edukasi_id)->first(); //untuk menampilkan jenis yang terbaru      
        $materi = MateriEdukasi::where('jenis_edukasi_id', $first?->id)->first(); //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_edukasi_id', $materi->jenis_edukasi_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_edukasi_id', $materi->jenis_edukasi_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('id', $sub_materi_edukasi_id)->first();
            $firstRating = RatingEdukasi::where('sub_materi_edukasi_id', $firstSub?->id)->count('id');
            $avgRating = RatingEdukasi::where('sub_materi_edukasi_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;    
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        return view('edukasi.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $currentMateriEdukasi = MateriEdukasi::find($id);

        $validatedMateriEdukasi = $request->validate([
            'judul_materi' => 'required',
        ]);
        $currentMateriEdukasi->update($validatedMateriEdukasi);

        return redirect()->back()->with('success', 'Materi Edukasi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}