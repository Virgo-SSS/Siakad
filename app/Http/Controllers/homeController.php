<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            if($user->type == 'PMB'){
                return view('pmb.home', compact('countries'));
            }

            return view('student.home', compact('countries'));
        
        }
    }
    
}
