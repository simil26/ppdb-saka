<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataKesejahteraan;
use App\Models\DataPeriodik;
use App\Models\DokumenPendaftaran;
use App\Models\StatusDaftarOnline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UploadFilesController extends Controller
{
    public function index()
    {
        if (!session()->has('noreg_ppdb')) {
            return redirect()->route('login');
        }
        $statusActiveFieldKesejahteraan = DataKesejahteraan::where('noreg_ppdb', session('noreg_ppdb'))->first();
        $statusDaftarOnline = StatusDaftarOnline::where('noreg_ppdb', session('noreg_ppdb'))->first();

        $dokumenPendaftaran = [];

        if (DokumenPendaftaran::where('noreg_ppdb', session('noreg_ppdb'))->exists()) {
            $dokumenPendaftaran = DokumenPendaftaran::where('noreg_ppdb', session('noreg_ppdb'))->first();
        }

        $data = [
            'title' => 'Unggah Dokumen',
            'active' => 'upload-files',
            'statusActiveFieldKesejahteraan' => $statusActiveFieldKesejahteraan,
            'statusDaftarOnline' => $statusDaftarOnline,
            'dokumenPendaftaran' => $dokumenPendaftaran,
        ];


        return view('user.upload-files', $data);
    }

    public function store(Request $request)
    {
        $noregPPDB = session('noreg_ppdb');

        $files = [
            'pas_foto' => $request->file('pas_foto') ? $request->file('pas_foto') : '-',
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
            'pas_foto' => '-',
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

        // $request->session()->forget('editFiles');
        if (DokumenPendaftaran::where('noreg_ppdb', $noregPPDB)->exists()) {
            return redirect()->route('user.uploadFiles.selesai')->with('success', 'Dokumen berhasil diperbaharui');
        }
        $uploadAttempt = DokumenPendaftaran::create($dokumenPPDB);

        if ($uploadAttempt) {
            StatusDaftarOnline::where('noreg_ppdb', $noregPPDB)
                ->update(['statusDokumenPendaftaran' => '1']);
            return redirect()->route('user.uploadFiles.selesai')->with('success', 'Dokumen berhasil diunggah');
        } else {
            return redirect()->route('user.uploadFiles')->with('error', 'Dokumen gagal diunggah');
        }
    }

    public function showDokumen()
    {
        $noregPPDB = session('noreg_ppdb');
        $dokumenPPDB = DokumenPendaftaran::where('noreg_ppdb', $noregPPDB)->first();
        $statusDaftarOnline = StatusDaftarOnline::where('noreg_ppdb', session('noreg_ppdb'))->first();
        $data = [
            'title' => 'Dokumen Pendaftaran',
            'active' => 'dokumen-pendaftaran',
            'dokumenPPDB' => $dokumenPPDB,
            'statusDaftarOnline' => $statusDaftarOnline,
        ];
        return view('user.dokumen-pendaftaran', $data);
    }
}
