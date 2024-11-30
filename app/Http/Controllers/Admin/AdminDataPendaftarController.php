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
            'biodata' => $dataPendaftar
        ];
        return view('admin.admin-data-pendaftar', $data);
    }
}
