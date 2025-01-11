<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutAdminController extends Controller
{
    public function logout(Request $request)
    {
        if (!$request->session()->has('username')) {
            return redirect()->route('admin.login');
        }
        $request->session()->forget('username');
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
