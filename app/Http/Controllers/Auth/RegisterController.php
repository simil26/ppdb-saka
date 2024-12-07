<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = $request->all();
        dd($data);
    }
}
