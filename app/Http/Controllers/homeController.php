<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\dosen;
use App\Models\pelajar;
use App\Models\karyawan;
use App\Models\aspiration;
use App\Models\registrasi;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $admins = User::count();
        $dosen = dosen::count();
        $pelajar = registrasi::where('isMahasiswa', 1)->count();
        $pelajar2 = registrasi::where('isMahasiswa', 0)->count();
        $karyawan = karyawan::count();


        $rgs = registrasi::all();
        return view('home.home', compact('admins', 'dosen',  'karyawan', 'pelajar', 'pelajar2', 'rgs'));
    }

    public function listaspiration()
    {
        $cp = aspiration::all();
       
        
        return view('aspiration.index', compact('cp'));
    }

    public function aspiration()
    {
        return view('aspiration.aspiration');
    }

    public function submitaspiration(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $aspiration = new aspiration;
        $aspiration->category = $request->category;
        $aspiration->title = $request->title;
        $aspiration->description = $request->description;
        $aspiration->save();

        return back()->with('success', 'Aspiration has been Sent, Thank You for your participation');
    }

    public function filteraspi(Request $request)
    {
        $category = $request->category;

        $cp = aspiration::where('category',  'like', "%{$category}%")->get();
        return view('aspiration.index', compact('cp'));
    }
}
