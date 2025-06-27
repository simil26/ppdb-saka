<?php

namespace App\Http\Controllers\Admin;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenPendaftaran;

class HasilSeleksiController extends Controller
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->route('admin.login');
        }
        $dataPendaftar = Biodata::all();

        // dd($dataPendaftar);
        $data = [
            'title' => 'Hasil Seleksi',
            'active' => 'hasil-seleksi',
            'usingDatatables' => true,
            'dataPendaftar' => $dataPendaftar,
        ];


        return view('admin.hasil-seleksi', $data);
    }

    public function unduhDokumen($noreg_ppdb)
    {
        $zipArchiver = new \ZipArchive();
        $zipFileName = 'dokumen-pendaftaran-' . $noreg_ppdb . '.zip';
        $fileCollection = DokumenPendaftaran::where('noreg_ppdb', $noreg_ppdb)->first();
        $zipFilePath = public_path('assets/files/' . $zipFileName);
        if ($zipArchiver->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            $files = [];
            if ($fileCollection) {
                foreach ($fileCollection->getAttributes() as $key => $value) {
                    if ($value !== '-') {
                        if (gettype($value) !== 'integer') {
                            $files[] = $value;
                        }
                    }
                }
                array_splice($files, 0, 1);
                array_pop($files); // Remove 'noreg_ppdb' from the list
                array_pop($files); // Remove 'noreg_ppdb' from the list
            }

            foreach ($files as $file) {
                $filePath = public_path('assets/files/' . $noreg_ppdb . '/' . $file);
                if (is_dir($filePath)) {
                    $zipArchiver->addEmptyDir($file);
                    $this->addFilesToZip($zipArchiver, $filePath, $file);
                } elseif (is_file($filePath)) {
                    $zipArchiver->addFile($filePath, $file);
                }
            }

            $zipArchiver->close();

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }
    }
}
