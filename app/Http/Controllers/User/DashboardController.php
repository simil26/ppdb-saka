<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('email')) {
            return redirect()->route('login');
        }
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
        ];

        return view('user.dashboard', $data);
    }
}
