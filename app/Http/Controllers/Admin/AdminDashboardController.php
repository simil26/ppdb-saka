<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->route('admin.login');
        }
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'usingDatatables' => false
        ];
        return view('admin.admin-dashboard', $data);
    }
}
