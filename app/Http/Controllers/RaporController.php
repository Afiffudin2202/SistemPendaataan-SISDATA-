<?php

namespace App\Http\Controllers;

use App\Models\Rapor;
use App\Models\Siswa;
use App\Models\Periode;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Rekap Rapor";
        $rapors = Rapor::with('siswa', 'periode')->get();
        return view('admin.rapor.data_rapor', compact('title', 'rapors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Nilai";
        $periode = Periode::latest()->get();
        $siswa = Siswa::with('kuu')->latest()->get();
        return view('admin.rapor.input_nilai', compact('title', 'periode', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'id_periode' => 'required',
            'id_siswa' => 'required',
            'passing' => 'required|in:A,B,C,D',
            'dribling' => 'required|in:A,B,C,D',
            'control' => 'required|in:A,B,C,D',
            'intercept' => 'required|in:A,B,C,D',
            'heading' => 'required|in:A,B,C,D',
            'shooting' => 'required|in:A,B,C,D',
            'leadership' => 'required|in:A,B,C,D',
            'attitude' => 'required|in:A,B,C,D',
            'communication' => 'required|in:A,B,C,D',
            'notes' => 'required'
        ]);

        Rapor::create($validatedData);
        return redirect('input-nilai')->with('success', 'berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rapor $rapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rapor = Rapor::find($id);
        $title = "Edit Nilai";
        $periode = Periode::latest()->get();
        $siswa = Siswa::with('kuu')->latest()->get();
        return view('admin.rapor.edit', compact('rapor', 'periode', 'siswa', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rapor = Rapor::find($id);
        // dd($rapor);
        $validatedData = $request->validate([
            'id_periode' => 'required',
            'id_siswa' => 'required',
            'passing' => 'required|in:A,B,C,D',
            'dribling' => 'required|in:A,B,C,D',
            'control' => 'required|in:A,B,C,D',
            'intercept' => 'required|in:A,B,C,D',
            'heading' => 'required|in:A,B,C,D',
            'shooting' => 'required|in:A,B,C,D',
            'leadership' => 'required|in:A,B,C,D',
            'attitude' => 'required|in:A,B,C,D',
            'communication' => 'required|in:A,B,C,D',
            'notes' => 'required'
        ]);

        $rapor->update($validatedData);
        return redirect('input-nilai/' . $id . '/edit')->with('success', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rapor = Rapor::find($id);
        if ($rapor) {
            $rapor->delete();
            return redirect('data-rapor')->with('success', 'Berhasil dihapus');
        }

        return redirect('data-rapor')->withErrors('Gagal Menghapus');
    }

    public function downloadRaporPdf($id)
    {
        // $rapor = Rapor::find($id);
        // // Pastikan model ditemukan, jika tidak kembalikan respon error atau not found
        // if (!$rapor) {
        //     return redirect()->back()->with('error', 'Rapor not found');
        // }

        // // Konversi model ke array
        // $data = [
        //     'rapor' => $rapor->toArray()
        // ];
        // $pdf = Pdf::loadView('admin/rapor/rapor-pdf', $data);
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('rapor.pdf');
        $rapor = Rapor::with('siswa')->find($id); // Asumsi ada relasi 'siswa' di model Rapor

        // Pastikan model ditemukan, jika tidak kembalikan respon error atau not found
        if (!$rapor) {
            return redirect()->back()->with('error', 'Rapor not found');
        }

        // Load view dengan data
        $pdf = PDF::loadView('admin/rapor/rapor-pdf', compact('rapor')); // Kirim variabel rapor ke view
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('rapor.pdf');
    }
}
