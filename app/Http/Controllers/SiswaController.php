<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ku_usia;

class SiswaController extends Controller
{
    public function index()
    {
        $title = "Data Siswa";
        $kUmur = Ku_usia::all();
        $siswa = Siswa::with('kuu')->latest()->get();

        return view('admin.siswa', compact('title', 'siswa', 'kUmur'));
    }

    public function show(Siswa $siswa) {
        $title = 'Biodata Siswa';
        return view('admin.siswa-detail', compact('title', 'siswa'));
    }

    
    public function store(Request $request)
    {
        // dd($request->id_ku);
        $rules = [
            'id_ku' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status' => 'required'
        ];


        $validated = $request->validate($rules);
        Siswa::create($validated);

        // menambah jumlah siswa di kualifikasi usia
        $jumlah = Ku_usia::where('id', $request->id_ku)->first();
        $jumlah->jumlah_siswa += 1;
        $jumlah->save();
        return redirect('/siswa')->with('success', 'berhasil menambahkan data baru');
    }

    public function update(Request $request, Siswa $siswa)
    {

        $rules = [
            'id_ku' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status' => 'required'
        ];
        $validated = $request->validate($rules);

        $ku = Ku_usia::where('id', $siswa->id_ku)->first();

        if ($request->id_ku == $ku) {
            $siswa->update($validated);
        } else {
            // identifikasi inputan lama dan inputan baru
            $ku_lama = $siswa->id_ku;
            $ku_baru = $request->id_ku;

            // menghapus jumlah siswa dari kualifikasi yang lama
            $hapus_ku = Ku_usia::where('id', $ku_lama)->first();
            $hapus_ku->jumlah_siswa -= 1;
            $hapus_ku->save();

            // menambahkan jumlah siswa dengan kualifikasi yang baru
            $update_ku = Ku_usia::where('id', $ku_baru)->first();
            $update_ku->jumlah_siswa += 1;
            $update_ku->save();

            // simpan update siswa
            $siswa->update($validated);
        }
        return redirect('/siswa')->with('success', 'Berhasil Edit siswa');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        // Mengurangi jumlah siswa di kuaifikasi umur
        $jumlah = Ku_usia::where('id', $siswa->id_ku)->first();
        $jumlah->jumlah_siswa -= 1;
        $jumlah->save();
        return redirect('siswa')->with('success', 'Data berhasil di hapus');
    }
}
