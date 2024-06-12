<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Institusi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $institusi = Institusi::latest()->first();
        $title = 'Data Divisi';
        $divisi = Divisi::with('institusi')->latest()->get();
        return view('admin.divisi', compact('institusi', 'title', 'divisi'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_institusi' => 'required',
            'nama_divisi' => 'required'
        ];
        
        $validated = $request->validate($rules);
        Divisi::create($validated);

        return redirect('admin/divisi')->with('success', 'Sukses menambahkan divisi baru');
    }

    public function update(Request $request, Divisi $divisi){
      
        $rules = [
            'id_institusi' => 'required',
            'nama_divisi' => 'required'
        ];

        $validated = $request->validate($rules);

        $divisi->update($validated);
        return redirect('divisi')->with('success', 'Berhasil Edit data');
    }

    public function destroy(Divisi $divisi) {
        // dd($divisi);
        $divisi->delete();
        return redirect('/divisi')->with('success', 'Data divisi berhasil di hapus');
    }
}
