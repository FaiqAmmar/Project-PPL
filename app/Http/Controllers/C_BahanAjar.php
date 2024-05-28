<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BahanAjar; 


class C_BahanAjar extends Controller
{
    public function BahanAjar()
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
    public function EditBahanAjar()
    {
        $currentuser = User::find(Auth::user()->id);
        $currentBahanAjar = BahanAjar::where('user_id', $currentuser->id)->get();

        return view('bahan-ajar.V_bahan-ajar-edit', compact('currentBahanAjar'));
    }
    public function update_bahan_ajar(Request $request, $id)
    {
        $currentBahanAjar = BahanAjar::find($id);

        $validatedBahanAjar = $request->validate([
            'ajuan' => 'required',
        ]);
        $currentBahanAjar->update($validatedBahanAjar);

        return redirect('/edit-bahan-ajar')->with('success', 'Bahan Ajar Berhasil Diubah!');
    }
    public function BahanAjarDetail()
    {
        $detail = BahanAjar::with('user')->get();

        return view('bahan-ajar.V_bahan-ajar-detail', compact('detail'));
    }
}
