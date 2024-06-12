<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $title = "Periode";
        $periode = Periode::latest()->get();
        return view('admin.rapor.setting_periode', compact('title', 'periode'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_periode' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        Periode::create($validatedData);

        return redirect('/setting-periode')->with('success', "berhasil");
    }

    public function update(Request $request, $id)
    {
        $periode = Periode::find($id);
        // dd($periode);
        $validatedData = $request->validate([
            'nama_periode' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        $periode->update($validatedData);

        return redirect('/setting-periode')->with('success', 'Berhasil');
    }

    public function destroy($id) {
        $periode = Periode::find($id);

        $periode->delete();

        return redirect('/setting-periode')->with('success', 'Berhasil');
    }
}
