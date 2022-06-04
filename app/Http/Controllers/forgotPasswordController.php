<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgotPasswordController extends Controller
{
    public function index()
    {
        return view('login.forgot_password');
    }
}
