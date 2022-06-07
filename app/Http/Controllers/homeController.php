<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\batch;
use App\Repository\GlobalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;

class homeController extends Controller
{
    public function __construct()
    {
        $this->data = new GlobalRepository;
    }

    public function index()
    {
        $data = $this->data->getAppData();

        if(Auth::check()){
            $user = User::where('id', Auth::user()->id)->first();

            if($user->type == 'PMB') return view('pmb.home', $data);
            
            return view('student.home', $data);
        }
    }
    
}
