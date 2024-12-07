<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Biodata;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Data Pendaftar',
            'usingDatatables' => true,
            'dataPendaftar' => Biodata::all(),
        ];

        return view('front.data-pendaftar', $data);
    }
}
