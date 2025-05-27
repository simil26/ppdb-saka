<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DokumenPendaftaran;
use Illuminate\Http\Request;

class UploadFilesController extends Controller
{
    public function index()
    {
        if (!session()->has('noreg_ppdb')) {
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
        $userID = auth()->user()->id;
        $noregPPDB = $request->input('noreg_ppdb');

        $files = [
            'ijazah' => $request->file('ijazah') ? $request->file('ijazah') : '-',
            'kk' => $request->file('kk') ? $request->file('kk') : '-',
            'akte' => $request->file('akte') ? $request->file('akte') : '-',
            'ktp' => $request->file('ktp') ? $request->file('ktp') : '-',
            'kip' => $request->file('kip') ? $request->file('kip') : '-',
            'kis' => $request->file('kis') ? $request->file('kis') : '-',
            'kks' => $request->file('kks') ? $request->file('kks') : '-',
            'kps' => $request->file('kps') ? $request->file('kps') : '-',
            'pkh' => $request->file('pkh') ? $request->file('pkh') : '-',
        ];

        $dokumenPPDB = [
            'noreg_ppdb' => $noregPPDB,
            'user_id' => $userID,
            'ijazah' => '-',
            'kk' => '-',
            'akte' => '-',
            'ktp' => '-',
            'kip' => '-',
            'kis' => '-',
            'kks' => '-',
            'kps' => '-',
            'pkh' => '-',
        ];

        foreach ($files as $key => $file) {
            if ($file != "-") {
                if ($file->extension() == 'jpg' || $file->extension() == 'jpeg' || $file->extension() == 'png') {
                    $dokumenPPDB[$key] = $noregPPDB . '-' . $key . '.' . $file->extension();
                }
                $file->move(public_path('assets/files/' . $noregPPDB . '/'), $noregPPDB . '-' . $key . '.' . $file->extension());
            }
        }

        $uploadAttempt = DokumenPendaftaran::create($dokumenPPDB);

        if ($uploadAttempt) {
            session()->put('uploadFiles', 'success');
            return redirect()->route('user.uploadFiles.selesai')->with('success', 'Dokumen berhasil diunggah');
        } else {
            return redirect()->route('user.uploadFiles')->with('error', 'Dokumen gagal diunggah');
        }
    }

    public function showDokumen()
    {
        $userID = auth()->user()->id;
        $dokumenPPDB = DokumenPendaftaran::where('user_id', $userID)->first();
        $data = [
            'title' => 'Dokumen Pendaftaran',
            'active' => 'dokumen-pendaftaran',
            'dokumenPPDB' => $dokumenPPDB
        ];

        return view('user.dokumen-pendaftaran', $data);
    }
}
