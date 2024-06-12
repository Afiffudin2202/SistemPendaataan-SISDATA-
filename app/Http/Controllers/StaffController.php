<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Divisi;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $title = 'Data Staff';
        $divisi = Divisi::with('institusi')->get();      
        $staff = Staff::with('divisi')->latest()->get();
        return view('admin.staff', compact('title', 'divisi', 'staff'));
    }

    public function store(Request $request) {
        
        $rules = [
            'id_divisi' => 'required',
            'nama_staff' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'no_tlp' => 'required|numeric'
        ];

        $validated = $request->validate($rules);

        Staff::create($validated);

        return redirect('admin/staff')->with('success', 'Berhasil tambah staff');
    }

    public function update(Request $request, Staff $staff){
        $rules = [
            'id_divisi' => 'required',
            'nama_staff' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'no_tlp' => 'required|numeric'
        ];

        $validated = $request->validate($rules);

        $staff->update($validated);

        return redirect('admin/staff')->with('success', 'Berhasil Edit data');
    }

    public function destroy(Staff $staff){
        $staff->delete();
        return redirect('staff')->with('success', 'Data telah di hapus');
    }
}
