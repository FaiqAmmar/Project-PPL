<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
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
    public function show(string $id)
    {
        
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
        $Jenis = $request->validate([
            'judul' => 'required',            
            'body'=> 'required',
            'video' => 'nullable|file', // max size 20MB                    
        ]);
        $update = [
            'judul' => $request->judul,
            'body' => $request->body,
        ];
        if ($request->video) {                  
            $videoPath = $request->file('video')->store('post-videos', 'public');                        
            $update['video_path'] = $videoPath;            
        }

        SubMateriEdukasi::Where('id', $id)
            ->update($update);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}