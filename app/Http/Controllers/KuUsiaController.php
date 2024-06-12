<?php

namespace App\Http\Controllers;

use App\Models\Ku_usia;
use Illuminate\Http\Request;

class KuUsiaController extends Controller
{
    public function index (){
        $ku = Ku_usia::all();
        $title = "Data Kualifikasi Usia";
        return view('admin.ku-usia', compact('title', 'ku'));
    }

    public function store(Request $request){
        $request->validate(
            ['tahun_usia' => 'required']
        );

        Ku_usia::create($request->all());

        return redirect('ku-usia')->with('success', 'berhasil Menambahkan data baru');
    }

    public function update(Request $request, Ku_usia $ku_usium){
       
        $request->validate(
            ['tahun_usia' => 'required']
        );

        $ku_usium->update($request->all());

        return redirect('ku-usia')->with('success','berhasil edit data');
    }

    public function destroy(Ku_usia $ku_usium){
        // dd($ku_usium);
        $ku_usium->delete();

        return redirect('ku-usia')->with('success', 'berhasil di hapus');
    }
}
