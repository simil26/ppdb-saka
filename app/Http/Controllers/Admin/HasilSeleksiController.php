<?php

namespace App\Http\Controllers\Admin;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilSeleksiController extends Controller
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->route('admin.login');
        }
        $biodata = Biodata::all();
        $data = [
            'title' => 'Hasil Seleksi',
            'active' => 'hasil-seleksi',
            'usingDatatables' => true,
            'dataPendaftar' => $biodata
        ];

        return view('admin.hasil-seleksi', $data);
    }
}
