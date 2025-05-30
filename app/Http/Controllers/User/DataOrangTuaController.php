<?php

namespace App\Http\Controllers\User;

use App\Models\DataOrangTua;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusDaftarOnline;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DataOrangTuaController extends Controller
{
    public function index()
    {
        if (!session()->has('noreg_ppdb')) {
            return redirect()->route('login');
        } else if (!session()->has('biodata_status')) {
            return redirect()->route('user.dataDiri')->with('warning', 'Silahkan lengkapi data diri terlebih dahulu!');
        }

        $dataOrangTua = [];
        if (StatusDaftarOnline::where('noreg_ppdb', Session::get('noreg_ppdb'))->first()->statusDataOrangTua == '1') {
            $dataOrangTua = DataOrangTua::where('noreg_ppdb', Session::get('noreg_ppdb'))->first();
        }

        $data = [
            'title' => 'Data Orang Tua',
            'active' => 'data-orang-tua',
            'dataOrangTua' => $dataOrangTua,
        ];
        return view('user.data-orang-tua', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'noreg_ppdb' => 'required',
            'nama_ayah' => 'required|min:3|max:191',
            'tempat_lahir_ayah' => 'required|min:3|max:191',
            'tanggal_lahir_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'alamat_ayah' => 'required|min:3|max:191',
            'nama_ibu' => 'required|min:3|max:191',
            'tempat_lahir_ibu' => 'required|min:3|max:191',
            'tanggal_lahir_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'alamat_ibu' => 'required|min:3|max:191',
        ];

        $errorMessages = [
            'noreg_ppdb.required' => 'Noreg PPDB tidak boleh kosong!',
            'nama_ayah.required' => 'Nama Ayah tidak boleh kosong!',
            'nama_ayah.min' => 'Nama Ayah minimal 3 karakter!',
            'nama_ayah.max' => 'Nama Ayah maksimal 191 karakter!',
            'tempat_lahir_ayah.required' => 'Tempat Lahir Ayah tidak boleh kosong!',
            'tempat_lahir_ayah.min' => 'Tempat Lahir Ayah minimal 3 karakter!',
            'tempat_lahir_ayah.max' => 'Tempat Lahir Ayah maksimal 191 karakter!',
            'tanggal_lahir_ayah.required' => 'Tanggal Lahir Ayah tidak boleh kosong!',
            'pendidikan_ayah.required' => 'Pendidikan Ayah tidak boleh kosong!',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah tidak boleh kosong!',
            'penghasilan_ayah.required' => 'Penghasilan Ayah tidak boleh kosong!',
            'alamat_ayah.required' => 'Alamat Ayah tidak boleh kosong!',
            'alamat_ayah.min' => 'Alamat Ayah minimal 3 karakter!',
            'alamat_ayah.max' => 'Alamat Ayah maksimal 191 karakter!',
            'nama_ibu.required' => 'Nama Ibu tidak boleh kosong!',
            'nama_ibu.min' => 'Nama Ibu minimal 3 karakter!',
            'nama_ibu.max' => 'Nama Ibu maksimal 191 karakter!',
            'tempat_lahir_ibu.required' => 'Tempat Lahir Ibu tidak boleh kosong!',
            'tempat_lahir_ibu.min' => 'Tempat Lahir Ibu minimal 3 karakter!',
            'tempat_lahir_ibu.max' => 'Tempat Lahir Ibu maksimal 191 karakter!',
            'tanggal_lahir_ibu.required' => 'Tanggal Lahir Ibu tidak boleh kosong!',
            'pendidikan_ibu.required' => 'Pendidikan Ibu tidak boleh kosong!',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu tidak boleh kosong!',
            'penghasilan_ibu.required' => 'Penghasilan Ibu tidak boleh kosong!',
            'alamat_ibu.required' => 'Alamat Ibu tidak boleh kosong!',
            'alamat_ibu.min' => 'Alamat Ibu minimal 3 karakter!',
            'alamat_ibu.max' => 'Alamat Ibu maksimal 191 karakter!',
        ];
        $dataOrangTua = $request->validate($rules, $errorMessages);
        if ($dataOrangTua) {
            try {
                DataOrangTua::create($dataOrangTua);
                StatusDaftarOnline::where('noreg_ppdb', $dataOrangTua['noreg_ppdb'])
                    ->update(['statusDataOrangTua' => "1"]);
                return redirect('user/data-orang-tua')->with('success', 'Data Orang Tua berhasil disimpan!');
            } catch (\Exception $e) {
                return redirect('user/data-orang-tua')->with('error', 'Data Orang Tua gagal disimpan!');
            }
        } else {
            return redirect('user/data-orang-tua')->withErrors($errorMessages);
        }
    }
    public function update(Request $request)
    {
        $rules = [
            'noreg_ppdb' => 'required',
            'nama_ayah' => 'required|min:3|max:191',
            'tempat_lahir_ayah' => 'required|min:3|max:191',
            'tanggal_lahir_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'alamat_ayah' => 'required|min:3|max:191',
            'nama_ibu' => 'required|min:3|max:191',
            'tempat_lahir_ibu' => 'required|min:3|max:191',
            'tanggal_lahir_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'alamat_ibu' => 'required|min:3|max:191',
        ];

        $errorMessages = [
            'noreg_ppdb.required' => 'Noreg PPDB tidak boleh kosong!',
            'nama_ayah.required' => 'Nama Ayah tidak boleh kosong!',
            'nama_ayah.min' => 'Nama Ayah minimal 3 karakter!',
            'nama_ayah.max' => 'Nama Ayah maksimal 191 karakter!',
            'tempat_lahir_ayah.required' => 'Tempat Lahir Ayah tidak boleh kosong!',
            'tempat_lahir_ayah.min' => 'Tempat Lahir Ayah minimal 3 karakter!',
            'tempat_lahir_ayah.max' => 'Tempat Lahir Ayah maksimal 191 karakter!',
            'tanggal_lahir_ayah.required' => 'Tanggal Lahir Ayah tidak boleh kosong!',
            'pendidikan_ayah.required' => 'Pendidikan Ayah tidak boleh kosong!',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah tidak boleh kosong!',
            'penghasilan_ayah.required' => 'Penghasilan Ayah tidak boleh kosong!',
            'alamat_ayah.required' => 'Alamat Ayah tidak boleh kosong!',
            'alamat_ayah.min' => 'Alamat Ayah minimal 3 karakter!',
            'alamat_ayah.max' => 'Alamat Ayah maksimal 191 karakter!',
            'nama_ibu.required' => 'Nama Ibu tidak boleh kosong!',
            'nama_ibu.min' => 'Nama Ibu minimal 3 karakter!',
            'nama_ibu.max' => 'Nama Ibu maksimal 191 karakter!',
            'tempat_lahir_ibu.required' => 'Tempat Lahir Ibu tidak boleh kosong!',
            'tempat_lahir_ibu.min' => 'Tempat Lahir Ibu minimal 3 karakter!',
            'tempat_lahir_ibu.max' => 'Tempat Lahir Ibu maksimal 191 karakter!',
            'tanggal_lahir_ibu.required' => 'Tanggal Lahir Ibu tidak boleh kosong!',
            'pendidikan_ibu.required' => 'Pendidikan Ibu tidak boleh kosong!',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu tidak boleh kosong!',
            'penghasilan_ibu.required' => 'Penghasilan Ibu tidak boleh kosong!',
            'alamat_ibu.required' => 'Alamat Ibu tidak boleh kosong!',
            'alamat_ibu.min' => 'Alamat Ibu minimal 3 karakter!',
            'alamat_ibu.max' => 'Alamat Ibu maksimal 191 karakter!',
        ];

        $dataOrangTua = $request->validate($rules, $errorMessages);
        try {
            $result = DataOrangTua::where('noreg_ppdb', $dataOrangTua['noreg_ppdb'])->update($dataOrangTua);
            return redirect('user/data-orang-tua')->with('success', 'Data Orang Tua berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect('user/data-orang-tua')->with('error', 'Data Orang Tua gagal disimpan!');
        }
    }
}
