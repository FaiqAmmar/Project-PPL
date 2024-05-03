<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_JenisEdukasi;

class C_JenisEdukasi extends Controller
{
    public function index(){
    }
    public function create(){
    }
    public function store(Request $request){
        $Jenis = $request->validate([
            'judul_modul' => 'required'
        ]);

        $newJenis = M_JenisEdukasi::create($Jenis);

        return redirect(route('judulEdu.store'));
    }
}
