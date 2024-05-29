<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;

class C_Modul extends Controller
{
    public function index()
    {
        $modul = Modul::get();

        return view("modul.V_modul", compact("modul"));
    }
    public function nambah_modul(Request $request)
    {
        $messages = [
            'judul_modul.required' => 'isi file',
            'deskripsi_modul.required' => 'isi desc',
            'video.required' => 'isi video',
            'modul.required' => 'File proposal tidak boleh kosong.',
            'modul.mimes' => 'Hanya menerima file pdf.',

        ];
        $validatedModul = $request->validate([
            'judul_modul' => 'required',
            'deskripsi_modul'=> 'required',
            'video'=> 'required|mimes:mp4',
            'modul' => 'required|mimes:pdf',
        ], $messages);

        $newModul = Modul::create($validatedModul);
        $file = $request->modul;
        $video = $request->video;

        if ($video) {
            $extension = $video->getClientOriginalExtension();
            $videoName =  $newModul->judul_modul.'.' . $extension;
            $video->storeAs('public/file_videos', $videoName);
            $newModul->video = $videoName;
            $newModul->update();
        }

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName =  $newModul->judul_modul. '.' . $extension;
            $file->storeAs('public/file_moduls', $fileName);
            $newModul->modul = $fileName;
            $newModul->update();
        }


        return redirect()->back()->with('success','');
    }
    public function update_modul(Request $request, $id)
    {
        $currentmodul = Modul::find($id);

        $validatedStatus = $request->validate([
            'status'=> 'required',
        ]);

        $currentmodul->update($validatedStatus);
        return redirect()->back()->with('success','');
    }
}
