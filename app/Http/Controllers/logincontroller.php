<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        
        return redirect('/login');
    }


}
