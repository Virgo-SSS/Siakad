<?php

namespace App\Http\Controllers;

use App\Models\calon_pelajar;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:calon_pelajar',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $registrasi = new calon_pelajar();
        $registrasi->name = $request->name;
        $registrasi->email = $request->email;
        $registrasi->password = bcrypt($request->password);
        $registrasi->confirm_password = bcrypt($request->confirm_password);
        $registrasi->isMahasiswa = $request->isMahasiswa;
        $registrasi->save();

        return redirect()->route('home');
    }

    // protected function();
}
