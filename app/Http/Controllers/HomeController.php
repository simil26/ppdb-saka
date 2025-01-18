<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Fungsi index selalu menjadi fungsi utama yg dipanggil untuk menampilkan halaman
    public function index()
    {
        //Membuat variable dengan nama data dengan tipe associative array
        //Associative array adalah array yg memiliki key/kata kunci dan value/isi, contoh "kata_kunci => isi"
        $data = [
            'page_title' => 'Portal',
            'usingDatatables' => false,
        ];

        //"return" adalah fungsi bawaan php untuk mengembalikan sesuatu, untuk laravel bisa mengembalikan view dan data
        //"view" adalah fungsi bawaan laravel untuk menampilkan halaman, contoh "view('home', $data)"
        return view('home', $data);
    }
}
