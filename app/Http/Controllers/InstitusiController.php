<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function index(){
        $dataInstitusi = Institusi::latest()->first();
        $title = 'Data Institusi';
        return view('admin.institusi', compact('title', 'dataInstitusi'));
    }

    public function store(Request $request) {
        $rules = [
            'nama_institusi' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required|email',
            'instagram' => 'required',
            'tiktok' => 'required',
            'nama_pimpinan' => 'required'
        ];

        $validated = $request->validate($rules);
        Institusi::create($validated);

        return redirect('/institusi')->with('success','Data Berhasil di tambahkan');
    }
}
