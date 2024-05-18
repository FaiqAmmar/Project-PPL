<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BahanAjar; 


class C_BahanAjar extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        return view('bahan-ajar.V_bahan-ajar', compact('currentuser'));
    }
    public function create_bahan_ajar(Request $request)
    {
        $validatedBahanAjar = $request->validate([
            'ajuan' => 'required',
            'user_id' => 'required',
        ]);
        BahanAjar::create($validatedBahanAjar);

        return redirect()->route('bahan-ajar')->with('success','');
    }
    public function edit_bahan_ajar()
    {
        $id = BahanAjar::get()->id;
        $currentBahanAjar = BahanAjar::find($id);

        return view('bahan-ajar.V_bahan-ajar-edit', compact('currentBahanAjar'));
    }
    public function update_bahan_ajar(Request $request, $id)
    {
        $currentBahanAjar = BahanAjar::find($id);

        $validatedBahanAjar = $request->validate([
            'ajuan' => 'required',
        ]);
        $currentBahanAjar->update($validatedBahanAjar);

        return redirect('/bahan-ajar')->with('success', 'Bahan Ajar Berhasil Diubah!');
    }
    public function view_detail_bahan_ajar()
    {
        $detail = BahanAjar::with('user')->get();

        return view('bahan-ajar.V_bahan-ajar-detail', compact('detail'));
    }
}
