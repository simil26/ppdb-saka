<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Data Pendaftar',
            'usingDatatables' => true,
        ];

        return view('front.data-pendaftar', $data);
    }
}
