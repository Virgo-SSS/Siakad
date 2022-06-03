<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\dosen;
use App\Models\pelajar;
use App\Models\karyawan;
use App\Models\aspiration;
use App\Models\registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;

class homeController extends Controller
{
    public function index()
    {
        $countries = CountryListFacade::getlist();
        if(Auth::check()){
            $user = User::where('id', Auth::user()->id)->first();

            if($user->isMahasiswa == 0){
                if($user->isActive == 0 || $user->isActive == 1 ){
                    return view('home.not_student', compact('countries'));
                }

            }
            return view('home.student', compact('countries'));
        
        }
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
