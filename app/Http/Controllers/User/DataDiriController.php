<?php

namespace App\Http\Controllers\User;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusDaftarOnline;
use Illuminate\Support\Facades\Session;

class DataDiriController extends Controller
{
    public function index()
    {
        if (!session()->has('noreg_ppdb')) {
            return redirect()->route('login');
        }
        $biodata = [];
        $biodataStatus = StatusDaftarOnline::where('noreg_ppdb', Session::get('noreg_ppdb'))->first();
        if ($biodataStatus['statusBiodata'] == '1') {
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
            'nik' => 'required',
            'nama' => 'required|min:3|max:197',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3|max:197',
            'tanggal_lahir' => 'required',
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
            'nik.required' => 'NIK harus diisi',
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 197 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 3 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 197 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
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
        try {
            Biodata::create($biodata);
            StatusDaftarOnline::where('noreg_ppdb', Session::get('noreg_ppdb'))->update(['statusBiodata' => '1']);
            return redirect()->to('user/data-diri')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->to('user/data-diri')->with('error', 'Data gagal disimpan');
        }
    }
    public function update(Request $request)
    {

        $rules = [
            'noreg_ppdb' => 'required',
            'nik' => 'required',
            'nama' => 'required|min:3|max:197',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3|max:197',
            'tanggal_lahir' => 'required',
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
            'nik.required' => 'NIK harus diisi',
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 197 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 3 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 197 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
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
            Biodata::where('noreg_ppdb', $biodata['noreg_ppdb'])->update($biodata);

            return redirect()->to('user/data-diri')->with('success', 'Data berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->to('user/data-diri')->with('error', 'Data gagal disimpan');
        }
    }
}
