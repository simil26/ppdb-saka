<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {
            return redirect()->route('user.dashboard');
        }

        $data = [
            'title' => 'Login',
        ];
        return view('front.login', $data);
    }

    public function login(Request $request)
    {
        $rules = [
            'noreg_ppdb' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'noreg_ppdb.required' => 'Nomor Pendaftaran harus diisi',
            'password.required' => 'Kata sandi harus diisi',
        ];
        try {
            $credentials = $this->validate($request, $rules, $messages);
            $auth = Auth::attempt($credentials);
            if ($auth) {
                $user = User::where('noreg_ppdb', $request->noreg_ppdb)->first();
                $request->session()->put('noreg_ppdb', $user->noreg_ppdb);
                return redirect()->route('user.dashboard')->with('loginSession', 'Login berhasil');
            } else {
                return redirect()->back()->withInput()->with('loginError', 'Email atau password salah');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
