<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisEdukasi;
use Illuminate\Http\Request;
use App\Models\MateriEdukasi;
use App\Models\RatingEdukasi; 
use App\Models\UlasanEdukasi; 
use App\Models\SubMateriEdukasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class C_SubMateriEdukasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'judul' => 'required',
            'body'=> 'required',
            'modul'=> 'required|mimes:pdf',
            'materi_edukasi_id'=> 'required',
            'video' => 'nullable|mimes:mp4', // max size 20MB                    
        ]);
        $SubMateri =SubMateriEdukasi::create($Jenis);
        $file = $request->modul;
        $video = $request->video;

        if ($video) {
            $extension = $video->getClientOriginalExtension();
            $videoName =  $SubMateri->judul.'.' . $extension;
            $video->storeAs('public/sub_videos', $videoName);
            $SubMateri->video = $videoName;
            $SubMateri->update();
        }

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName =  $SubMateri->judul. '.' . $extension;
            $file->storeAs('public/sub_moduls', $fileName);
            $SubMateri->modul = $fileName;
            $SubMateri->update();
        }

        return redirect()->back()->with('success','');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Jenis = $request->validate([
            'id'=> 'required',
            'judul' => 'required',            
            'body'=> 'required',
            'modul'=> 'nullable|mimes:pdf',
            'video' => 'nullable|mimes:mp4', // max size 20MB                    
        ]);
        $update = [
            'judul' => $request->judul,
            'body' => $request->body,
        ];
        $Jenis = SubMateriEdukasi::where('id', $request->id)->first();

        if ($request->hasFile('modul')) {
            if ($request['modul'] !== null) {
            Storage::delete('public/sub_moduls/' . $Jenis['modul']);
            }
            $file = $request->file('modul');
            $extension = $file->getClientOriginalExtension();
            $nama_file = $update['judul'].'.'.$extension;
            $file->storeAs('public/sub_moduls', $nama_file);
            $update['modul'] = $nama_file;
        }

        if ($request->hasFile('video')) {
            if ($request['video'] !== null) {
            Storage::delete('public/sub_videos/' . $Jenis['video']);
            }
            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            $nama_file = $update['judul'].'.'.$extension;
            $file->storeAs('public/sub_videos', $nama_file);
            $update['video'] = $nama_file;
        }

        SubMateriEdukasi::Where('id', $request->id)->update($update);

        return redirect()->back();
    }

    public function ulasan(Request $request)
    {
        $user = Auth::user()->id;

        $validatedUlasan = $request->validate([
            'ulasan' => 'required',
            'sub_materi_edukasi_id'=> 'required',
        ]);
        $validatedUlasan['user_id'] = $user;
        UlasanEdukasi::Where('sub_materi_edukasi_id', $request->sub_materi_edukasi_id)->create($validatedUlasan);

        return redirect()->back()->with('success','');
    }
    public function rating(Request $request)
    {        
        $user = Auth::user()->id;
    
        $validatedRating = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'sub_materi_edukasi_id' => 'required',
        ]);
        $validatedRating['user_id'] = $user;
    
        $rating = RatingEdukasi::where('sub_materi_edukasi_id', $request->sub_materi_edukasi_id)
                                ->where('user_id', $user)
                                ->first();
    
        if ($rating) {
            // Update existing rating
            $rating->update(['rating' => $validatedRating['rating']]);
        } else {
            // Create new rating
            RatingEdukasi::create($validatedRating);
        }
    
        return redirect()->back()->with('success', 'Rating submitted successfully.');
    }
}