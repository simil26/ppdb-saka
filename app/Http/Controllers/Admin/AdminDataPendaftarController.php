<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class AdminDataPendaftarController extends Controller
{
    public function index()
    {
        $dataPendaftar = Biodata::all();
        $data = [
            'title' => 'Data Pendaftar',
            'active' => 'data-pendaftar',
            'usingDatatables' => true,
            'dataPendaftar' => $dataPendaftar
        ];
        return view('admin.admin-verifikasi-pendaftar', $data);
    }
}
