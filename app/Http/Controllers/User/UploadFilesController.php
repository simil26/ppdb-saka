<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFilesController extends Controller
{
    public function index()
    {
        if (!session()->has('email')) {
            return redirect()->route('login');
        }
        $data = [
            'title' => 'Unggah Dokumen',
            'active' => 'upload-files',
        ];

        return view('user.upload-files', $data);
    }

    public function store(Request $request)
    {
        $files = $request->all();
        dd($files);
    }
}
