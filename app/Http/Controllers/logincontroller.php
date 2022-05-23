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

    // LOGIN ADMIN 
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        if (Auth::guard('dosen')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        if (Auth::guard('pelajar')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        if (Auth::guard('karyawan')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        if(Auth::guard('registrasi')->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        

        return redirect('/login')->with('error', 'Email atau Password salah');
    }

    public function logout()
    {   
       
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        return redirect('/login');
        
        
    }


}
