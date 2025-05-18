<?php

namespace App\Http\Controllers\User;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusPendaftaran;
use Illuminate\Support\Facades\Session;

class DataDiriController extends Controller
{
    public function index()
    {
        if (!session()->has('noreg_ppdb')) {
            return redirect()->route('login');
        }
        $biodata = [];
        $biodataStatus = StatusPendaftaran::where('noreg_ppdb', Session::get('noreg_ppdb'))->first();
        if ($biodataStatus['biodata_status'] == '1') {
            $biodata = Biodata::where('noreg_ppdb', Session::get('noreg_ppdb'))->first();
        }

        $data = [
            'title' => 'Data Diri',
            'active' => 'data-diri',
            'biodata' => $biodata
        ];

        return view('user.data-diri', $data);
    }

    public function store(Request $request)
    {

        $rules = [
            'gelombang' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'nama' => 'required|min:3|max:197',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3|max:197',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required|min:3|max:197',
            'tahun_lulus' => 'required|min:4|max:4',
            'kelas' => 'required',
            'alamat' => 'required|min:3|max:197',
            'dusun' => 'required|min:3|max:197',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required|min:3|max:197',
            'kecamatan' => 'required|min:3|max:197',
            'kabupaten' => 'required|min:3|max:197',
            'provinsi' => 'required|min:3|max:197',
            'kode_pos' => 'required|min:5|max:5',
        ];
        $errorMessages = [
            'gelombang.required' => 'Gelombang harus diisi',
            'nisn.required' => 'NISN harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 197 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 3 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 197 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'asal_sekolah.required' => 'Asal Sekolah harus diisi',
            'asal_sekolah.min' => 'Asal Sekolah minimal 3 karakter',
            'asal_sekolah.max' => 'Asal Sekolah maksimal 197 karakter',
            'tahun_lulus.required' => 'Tahun Lulus harus diisi',
            'tahun_lulus.min' => 'Tahun Lulus minimal 4 karakter',
            'tahun_lulus.max' => 'Tahun Lulus maksimal 4 karakter',
            'kelas.required' => 'Kelas harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat minimal 3 karakter',
            'alamat.max' => 'Alamat maksimal 197 karakter',
            'dusun.required' => 'Dusun harus diisi',
            'dusun.min' => 'Dusun minimal 3 karakter',
            'dusun.max' => 'Dusun maksimal 197 karakter',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'desa.required' => 'Desa harus diisi',
            'desa.min' => 'Desa minimal 3 karakter',
            'desa.max' => 'Desa maksimal 197 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.min' => 'Kecamatan minimal 3 karakter',
            'kecamatan.max' => 'Kecamatan maksimal 197 karakter',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'kabupaten.min' => 'Kabupaten minimal 3 karakter',
            'kabupaten.max' => 'Kabupaten maksimal 197 karakter',
            'provinsi.required' => 'Provinsi harus diisi',
            'provinsi.min' => 'Provinsi minimal 3 karakter',
            'provinsi.max' => 'Provinsi maksimal 197 karakter',
            'kode_pos.required' => 'Kode Pos harus diisi',
            'kode_pos.min' => 'Kode Pos minimal 5 karakter',
            'kode_pos.max' => 'Kode Pos maksimal 5 karakter',
        ];

        $biodata = $request->validate($rules, $errorMessages);
        $biodata['noreg_ppdb'] = Session::get('noreg_ppdb');
        if (session()->has('biodata_status')) {
            $noreg_ppdb = Session::get('noreg_ppdb');
            $biodata['noreg_ppdb'] = $noreg_ppdb;
            Biodata::where('noreg', $noreg_ppdb)->update($biodata);
        } else {
            try {
                $biodata['noreg_ppdb'] = Session::get('noreg_ppdb');
                Biodata::create($biodata);
                Session::put('biodata_status', 'done');
                return redirect()->to('user/data-diri')->with('success', 'Data berhasil disimpan');
            } catch (\Exception $e) {
                return redirect()->to('user/data-diri')->with('error', 'Data gagal disimpan');
            }
        }
    }
    public function update(Request $request)
    {

        $rules = [
            'noreg_ppdb' => 'required',
            'gelombang' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'nama' => 'required|min:3|max:197',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3|max:197',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required|min:3|max:197',
            'tahun_lulus' => 'required|min:4|max:4',
            'kelas' => 'required',
            'alamat' => 'required|min:3|max:197',
            'dusun' => 'required|min:3|max:197',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required|min:3|max:197',
            'kecamatan' => 'required|min:3|max:197',
            'kabupaten' => 'required|min:3|max:197',
            'provinsi' => 'required|min:3|max:197',
            'kode_pos' => 'required|min:5|max:5',
        ];
        $errorMessages = [
            'noreg_ppdb.required' => 'Nomor Registrasi tidak valid, silahkan hubungi admin',
            'gelombang.required' => 'Gelombang harus diisi',
            'nisn.required' => 'NISN harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 197 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 3 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 197 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'asal_sekolah.required' => 'Asal Sekolah harus diisi',
            'asal_sekolah.min' => 'Asal Sekolah minimal 3 karakter',
            'asal_sekolah.max' => 'Asal Sekolah maksimal 197 karakter',
            'tahun_lulus.required' => 'Tahun Lulus harus diisi',
            'tahun_lulus.min' => 'Tahun Lulus minimal 4 karakter',
            'tahun_lulus.max' => 'Tahun Lulus maksimal 4 karakter',
            'kelas.required' => 'Kelas harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat minimal 3 karakter',
            'alamat.max' => 'Alamat maksimal 197 karakter',
            'dusun.required' => 'Dusun harus diisi',
            'dusun.min' => 'Dusun minimal 3 karakter',
            'dusun.max' => 'Dusun maksimal 197 karakter',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'desa.required' => 'Desa harus diisi',
            'desa.min' => 'Desa minimal 3 karakter',
            'desa.max' => 'Desa maksimal 197 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.min' => 'Kecamatan minimal 3 karakter',
            'kecamatan.max' => 'Kecamatan maksimal 197 karakter',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'kabupaten.min' => 'Kabupaten minimal 3 karakter',
            'kabupaten.max' => 'Kabupaten maksimal 197 karakter',
            'provinsi.required' => 'Provinsi harus diisi',
            'provinsi.min' => 'Provinsi minimal 3 karakter',
            'provinsi.max' => 'Provinsi maksimal 197 karakter',
            'kode_pos.required' => 'Kode Pos harus diisi',
            'kode_pos.min' => 'Kode Pos minimal 5 karakter',
            'kode_pos.max' => 'Kode Pos maksimal 5 karakter',
        ];

        $biodata = $request->validate($rules, $errorMessages);
        try {
            $result = Biodata::where('noreg_ppdb', $biodata['noreg_ppdb'])->update($biodata);

            return redirect()->to('user/data-diri')->with('success', 'Data berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->to('user/data-diri')->with('error', 'Data gagal disimpan');
        }
    }
}
