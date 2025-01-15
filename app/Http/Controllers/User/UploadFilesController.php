<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DokumenPendafataran;
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
        $userID = $request->user()->get('id');
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

        try {
            foreach ($files as $key => $file) {
                if ($file) {
                    $file->move(public_path('assets/files/' . $noregPPDB . '/'), $noregPPDB . '-' . $key . '.' . $file->extension());
                }
            }
            $dokumenPPDB = DokumenPendafataran::create([
                'noreg_ppdb' => $noregPPDB,
                'ijazah' => $noregPPDB . '-ijazah.' . $files['ijazah']->extension(),
                'kk' => $noregPPDB . '-kk.' . $files['kk']->extension(),
                'akte' => $noregPPDB . '-akte.' . $files['akte']->extension(),
                'ktp' => $noregPPDB . '-ktp.' . $files['ktp']->extension(),
                'kip' => $noregPPDB . '-kip.' . $files['kip']->extension(),
                'kis' => $noregPPDB . '-kis.' . $files['kis']->extension(),
                'kks' => $noregPPDB . '-kks.' . $files['kks']->extension(),
                'kps' => $noregPPDB . '-kps.' . $files['kps']->extension(),
                'pkh' => $noregPPDB . '-pkh.' . $files['pkh']->extension(),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengunggah file. Silahkan coba lagi.');
        }
    }
}
