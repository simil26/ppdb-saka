<?php

namespace App\Http\Controllers\User;

use App\Models\DataPeriodik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataKesejahteraan;

class DataPeriodikController extends Controller
{
    public function index()
    {
        if (!session()->has('email')) {
            return redirect()->route('login');
        }
        $dataPeriodik = DataPeriodik::where('noreg_ppdb', session('noreg_ppdb'))->first();
        $dataKesejahteraan = DataKesejahteraan::where('noreg_ppdb', session('noreg_ppdb'))->first();
        $data = [
            'title' => 'Data Periodik',
            'active' => 'data-periodik',
            'dataPeriodik' => $dataPeriodik,
            'dataKesejahteraan' => $dataKesejahteraan
        ];

        return view('user.data-periodik', $data);
    }

    public function store(Request $request)
    {
        $dataKesejahteraan = [];
        $rules = [
            'noreg_ppdb' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_rumah' => 'required',
            'waktu_tempuh' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
        ];

        $errorMessages = [
            'noreg_ppdb.required' => 'Nomor Registrasi PPDB harus diisi',
            'hobi.required' => 'Hobi harus diisi',
            'cita_cita.required' => 'Cita-cita harus diisi',
            'tinggi_badan.required' => 'Tinggi badan harus diisi',
            'berat_badan.required' => 'Berat badan harus diisi',
            'jarak_rumah.required' => 'Jarak rumah ke sekolah harus diisi',
            'waktu_tempuh.required' => 'Waktu tempuh ke sekolah harus diisi',
            'anak_ke.required' => 'Anak ke berapa harus diisi',
            'jumlah_saudara.required' => 'Jumlah saudara harus diisi',
        ];

        $credentials = $request->validate($rules, $errorMessages);
        $dataKesejahteraan['noreg_ppdb'] = $request->input('noreg_ppdb');
        $dataKesejahteraan['is_kip'] = $request->input('is_kip');
        $dataKesejahteraan['is_kis'] = $request->input('is_kis');
        $dataKesejahteraan['is_kks'] = $request->input('is_kks');
        $dataKesejahteraan['is_kps'] = $request->input('is_kps');
        $dataKesejahteraan['is_pkh'] = $request->input('is_pkh');
        $dataKesejahteraan['nomor_kip'] = $request->input('nomor_kip') ?? '-';
        $dataKesejahteraan['nomor_kis'] = $request->input('nomor_kis') ?? '-';
        $dataKesejahteraan['nomor_kks'] = $request->input('nomor_kks') ?? '-';
        $dataKesejahteraan['nomor_kps'] = $request->input('nomor_kps') ?? '-';
        $dataKesejahteraan['nomor_pkh'] = $request->input('nomor_pkh') ?? '-';

        // dd($dataKesejahteraan);
        try {
            $resutlPeriodik = DataPeriodik::create($credentials);
            $resultKesejahteraan = DataKesejahteraan::create($dataKesejahteraan);
            return redirect()->back()->with('success', 'Data periodik berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
