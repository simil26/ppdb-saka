<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Register',
            'active' => 'register',
        ];

        return view('front.register', $data);
    }
    public function register(Request $request)
    {

        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'bukti_bayar' => 'required|mimes:jpg,jpeg,png|max:2048',
        ];

        $messages = [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Konfirmasi password tidak sama dengan kolom password',
            'bukti_bayar.required' => 'Wajib mengupload bukti bayar',
            'bukti_bayar.mimes' => 'Bukti bayar harus berupa file jpg, jpeg, png',
            'bukti_bayar.max' => 'Bukti bayar maksimal 2MB',
        ];
        try {
            //Membuat nomor pendaftaran PPDB
            $noreg_ppdb = 'PPDB-' . date('Ymd') . rand(1000, 9999);
            //Cek apakah nomor pendaftaran sudah ada di database
            while ($noreg_ppdb == User::where('noreg_ppdb', $noreg_ppdb)->first()) {
                //Jika sudah ada, buat nomor pendaftaran baru
                $noreg_ppdb = 'PPDB-' . date('Ymd') . rand(1000, 9999);
            }

            //Validasi data yg diinputkan
            $credentials = $request->validate($rules, $messages);
            //Menambahkan nomor pendaftaran ke data yg diinputkan
            $credentials['noreg_ppdb'] = $noreg_ppdb;
            //Menambahkan nama file bukti bayar ke data yg diinputkan
            $credentials['bukti_bayar'] = $noreg_ppdb . '-bukti_bayar.' . $request->file('bukti_bayar')->extension();
            //Mengambil file bukti bayar dari form input
            $fileBuktiBayar = $request->file('bukti_bayar');
            //Memindahkan file bukti bayar ke folder assets/files/noreg_ppdb
            $fileBuktiBayar->move(public_path('assets/files/' . $noreg_ppdb . '/'), $credentials['bukti_bayar']);

            //Menyimpan data ke database
            $result = User::create($credentials);
            //Jika berhasil, simpan data pengguna ke session lalu diarahkan ke halaman dashboard
            $request->session()->put('noreg_ppdb', $result->noreg_ppdb);
            $request->session()->put('userName', $result->name);

            return redirect()->route('user.dashboard')->with('loginSession', 'Login berhasil');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->withInput()->withInput()->with('registerError', $e->getMessage());
        }
    }
}
