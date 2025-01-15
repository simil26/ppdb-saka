<?php

namespace App\Http\Controllers\User;

use App\Models\Biodata;
use App\Models\DataOrangTua;
use App\Models\DataPeriodik;
use App\Models\DataKesejahteraan;
use App\Models\DokumenPendafataran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('email')) {
            return redirect()->route('login');
        }
        $biodata = Biodata::where('user_id', auth()->user()->id)->first();
        $dataOrangTua = DataOrangTua::where('user_id', auth()->user()->id)->first();
        $dataPeriodik = DataPeriodik::where('user_id', auth()->user()->id)->first();
        $dataKesejahteraan = DataKesejahteraan::where('user_id', auth()->user()->id)->first();
        $uploadFiles = DokumenPendafataran::where('user_id', auth()->user()->id)->first();
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'biodata' => $biodata,
            'dataOrangTua' => $dataOrangTua,
            'dataPeriodik' => $dataPeriodik,
            'dataKesejahteraan' => $dataKesejahteraan,
            'uploadFiles' => $uploadFiles
        ];

        return view('user.dashboard', $data);
    }
}
