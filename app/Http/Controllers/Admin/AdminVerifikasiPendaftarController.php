<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class AdminVerifikasiPendaftarController extends Controller
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->route('admin.login');
        }
        $biodata = Biodata::all();
        $data = [
            'title' => 'Verifikasi Pendaftar',
            'active' => 'verifikasi-pendaftar',
            'usingDatatables' => true,
            'dataPendaftar' => $biodata
        ];
        return view('admin.admin-verifikasi-pendaftar', $data);
    }
    public function verifikasi($noreg_ppdb)
    {
        try {
            $biodata = Biodata::where('noreg_ppdb', $noreg_ppdb)->first();
            $biodata->is_accepted = 1;
            $biodata->save();
            return redirect()->back()->with('success', 'Pendaftar berhasil diverifikasi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
