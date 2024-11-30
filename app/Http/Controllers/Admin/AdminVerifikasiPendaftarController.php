<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class AdminVerifikasiPendaftarController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        $data = [
            'title' => 'Verifikasi Pendaftar',
            'active' => 'verifikasi-pendaftar',
            'usingDatatables' => true,
            'dataPendaftar' => $biodata
        ];
        return view('admin.admin-verifikasi-pendaftar', $data);
    }
}
