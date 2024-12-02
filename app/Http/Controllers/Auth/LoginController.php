<?php

namespace App\Http\Controllers\Auth;

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
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
        ];
        try {
            $credentials = $this->validate($request, $rules, $messages);
            $auth = Auth::attempt($credentials);
            if ($auth) {
                $request->session()->put('email', $request->email);
                return redirect()->route('user.dashboard')->with('loginSession', 'Login berhasil');
            } else {
                return redirect()->back()->withInput()->with('loginError', 'Email atau password salah');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
