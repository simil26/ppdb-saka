<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Kontak Kami',
            'usingDatatables' => false,
        ];

        return view('contact', $data);
    }
}
