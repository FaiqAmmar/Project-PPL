<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisEdukasi;

class C_JenisEdukasi extends Controller
{
    public function index()
    {
        return view('edukasi.V_edukasi');
    }
}