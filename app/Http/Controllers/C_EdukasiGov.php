<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
use App\Models\UlasanEdukasi;
use App\Models\RatingEdukasi;
use App\Models\User;

class C_EdukasiGov extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::orderBy('created_at', 'desc')->first(); //untuk menampilkan jenis yang terbaru
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('materi_id', $sub->id)->orderBy('created_at', 'asc')->first();
            $firstRating = RatingEdukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = RatingEdukasi::where('sub_id', $firstSub?->id)->avg('rating');            
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        // dd($avgRating, $firstRating);
        return view('edukasi.gov.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub', 'firstRating', 'avgRating'));
    }

    public function materi(string $id)
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::where('id', $id)->first(); //untuk menampilkan jenis yang terbaru        
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('materi_id', $sub->id)->orderBy('created_at', 'asc')->first();
            $firstRating = RatingEdukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = RatingEdukasi::where('sub_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        return view('edukasi.gov.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
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
            'jenis_id' => 'required'
        ]);
        // $test = SubMateriEdukasi::all();
        // dd($test);

        MateriEdukasi::create($Jenis);

        return redirect()->back();
    }
    public function subMateri(Request $request)
    {
        $Jenis = $request->validate([
            'judul' => 'required',
            'materi_id'=> 'required',
            'body'=> 'required',
            'video' => 'nullable|file', // max size 20MB                    
        ]);
        if ($request->video) {
            $videoPath = $request->file('video')->store('post-videos', 'public');                        
            $Jenis['video_path'] = $videoPath;
        }
        SubMateriEdukasi::create($Jenis);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $materi_id, string $sub_id)
    {
        $jenis = JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = JenisEdukasi::where('id', $materi_id)->first(); //untuk menampilkan jenis yang terbaru        
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('id', $sub_id)->first();
            $firstRating = RatingEdukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = RatingEdukasi::where('sub_id', $firstSub?->id)->avg('rating');
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        // dd($materi);
        return view('edukasi.gov.V_edukasi', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }

    public function ulasan(Request $request, string $id)
    {
        $ulasan = $request->validate([
            'author' => 'nullable',
            'isi' => 'required|string|max:120'
        ]);
        $user = User::find(auth()->user()?->id);
        if ($user !=  null) {
            $ulasan['user_id'] = $user;
        }
        $ulasan['sub_id'] = $id;

        UlasanEdukasi::create($ulasan);
        return redirect()->back();

    }
    public function rating(Request $request, string $id)
    {        
        $rating = $request->validate([            
            'rating' => 'required|integer'
        ]);
        $user = User::find(auth()->user()?->id);
        if ($user !=  null) {
            $rating['user_id'] = $user;
        }
        $rating['sub_id'] = $id;

        RatingEdukasi::create($rating);
        return redirect()->back();

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
