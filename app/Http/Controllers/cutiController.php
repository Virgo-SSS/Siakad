<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cutiController extends Controller
{
    public function index()
    {
        if(Auth::guard('web')){

            $cuti = cuti::all();
        }

        if(Auth::guard('pelajar')){

            $cuti = cuti::where('kategori', 'pelajar')->where('id_pembuat', Auth::id())->get();
        }

        if(Auth::guard('dosen')){

            $cuti = cuti::where('kategori', 'dosen')->where('id_pembuat', Auth::id())->get();
        }
        if(Auth::guard('karyawan')){

            $cuti = cuti::where('kategori', 'karyawan')->where('id_pembuat',Auth::id())->get();
        }
        return view('cuti.index', compact('cuti'));
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalmulai' => 'required',
            'tanggalselesai' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'id_pembuat' => 'required',
        ]);


        $cuti = new cuti;
        $cuti->tanggal_mulai = $request->tanggalmulai;
        $cuti->tanggal_selesai = $request->tanggalselesai;
        $cuti->keterangan = $request->keterangan;
        $cuti->status = $request->status;
        $cuti->id_pembuat = $request->id_pembuat;
        if(Auth::guard('pelajar')->check()){
            $cuti->kategori = 'Pelajar';
        }
        if(Auth::guard('dosen')->check()){
            $cuti->kategori = 'Dosen';
        }
        if(Auth::guard('karyawan')->check()){
            $cuti->kategori = 'karyawan';
        
        }
        $cuti->save();

        return redirect(route('cuti'))->with('success', 'Form Cuti Berhasil Dibuat. silahkan menunggu persetujuan, atau hubungi admin');

    }
}