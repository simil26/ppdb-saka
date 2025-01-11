<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        if (session()->has('username')) {
            return redirect()->route('admin.dashboard');
        }

        $data = [
            'title' => 'Login Administrator',
        ];
        return view('admin.login-admin', $data);
    }

    public function loginAdmin(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ];
        try {
            $user = UserAdmin::where('username', $request->username)->first();
            if ($user) {
                $request->session()->put('username', $user->username);
                $request->session()->put('name', $user->name);
                return redirect()->route('admin.dashboard')->with('loginSession', 'Login berhasil');
            } else {
                return redirect()->back()->withInput()->with('loginError', 'Email atau password salah');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
