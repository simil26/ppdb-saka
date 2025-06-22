<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if (!$request->session()->has('noreg_ppdb')) {
            return redirect()->route('login');
        }
        $request->session()->forget('noreg_ppdb');
        $request->session()->flush();
        return redirect()->route('login');
    }
}
