<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Portal',
            'usingDatatables' => false,
        ];

        // dd(compact('data'));

        return view('home', $data);
    }
}
