<?php

namespace App\Http\Controllers\User;

use App\Models\Biodata;
use App\Models\DataOrangTua;
use App\Models\DataPeriodik;
use App\Models\DataKesejahteraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenPendaftaran;

class DashboardController extends Controller
{
    public function index()
    {
        //fungsi if ini untuk mengecek apakah session email sudah ada atau belum
        //jika sudah berarti user sudah login dan akan diarahkan ke halaman dashboard
        //jika belum berarti user belum login dan akan diarahkan kembali ke halaman login
        if (!session()->has('email')) {
            return redirect()->route('login');
        }

        //5 variable dibawah ini digunakan untuk mengambil data dari database
        //data ini digunakan untuk melakukan pengecekan data yang sudah diisi oleh user atau belum, untuk digunakan pada komponen status pendaftaran
        $biodata = Biodata::where('user_id', auth()->user()->id)->first();
        $dataOrangTua = DataOrangTua::where('user_id', auth()->user()->id)->first();
        $dataPeriodik = DataPeriodik::where('user_id', auth()->user()->id)->first();
        $dataKesejahteraan = DataKesejahteraan::where('user_id', auth()->user()->id)->first();
        $uploadFiles = DokumenPendaftaran::where('user_id', auth()->user()->id)->first();

        //data dari 5 variable diatas akan dikirimkan ke view dashboard.blade.php melalui variable $data
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'biodata' => $biodata,
            'dataOrangTua' => $dataOrangTua,
            'dataPeriodik' => $dataPeriodik,
            'dataKesejahteraan' => $dataKesejahteraan,
            'uploadFiles' => $uploadFiles
        ];

        //fungsi if ini digunakan untuk mengecek apakah data diri sudah diisi atau belum
        //jika sudah diisi maka akan menyimpan data noreg_ppdb ke dalam session
        //noreg_ppdb dibutuhkan untuk mengirim data pada setiap kolom input di semua menu, agar data yg di inputkan terkunci sesuai dengan noreg_ppdb calon siswa
        if ($biodata) {
            session()->put('noreg_ppdb', $biodata->noreg_ppdb);
        }

        //fungsi if ini digunakan untuk mengecek apakah dokumen pendaftaran sudah di unggah atau belum
        //jika sudah di unggah maka akan membuat session uploadFiles dengan value selesai
        //session ini digunakan untuk pengecekan pada menu upload file
        //jika sudah di unggah maka url menu upload file akan diarahkan ke halaman yg menampilkan dokumen yg sudah di unggah
        //jika belum di unggah maka url menu upload file akan diarahkan ke halaman yg berisi form upload file
        if ($uploadFiles) {
            session()->put('uploadFiles', 'selesai');
        }

        return view('user.dashboard', $data);
    }
}
