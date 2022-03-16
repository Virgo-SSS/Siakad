<?php

namespace App\Http\Controllers\pelajar;

use App\Models\User;
use App\Models\roles;
use App\Models\registrasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registrasiController extends Controller
{
    
    public function index()
    {
        return view('pelajar.registerpelajar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:registrasis',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $registrasi = new registrasi;
        $registrasi->name = $request->name;
        $registrasi->email = $request->email;
        $registrasi->no_wa = $request->nowa;
        $registrasi->password = bcrypt($request->password);
        $registrasi->confirm_password = bcrypt($request->confirm_password);
        $registrasi->isMahasiswa = $request->isMahasiswa;
        $registrasi->save();

        return back()->with('success', 'Registrasi berhasil');
    }

   

}
