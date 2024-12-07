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
        ];

        $messages = [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Konfirmasi password tidak sama dengan kolom password',
        ];
        try {
            $credentials = $request->validate($rules, $messages);
            $result = User::create($credentials);
            return redirect()->route('login')->with('registerSuccess', 'Pendaftaran akun berhasil, silahkan login untuk mendaftar PPDB');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->withInput()->withInput()->with('registerError', $e->getMessage());
        }
    }
}
