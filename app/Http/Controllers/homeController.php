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

            if(config('global.userPath') == 'pmb') return view(config('global.userPath') . '.home', $data);
            if(config('global.userPath') == 'student')   return view(config('global.userPath') . '.home', $data);
          
        }
    }
    
}
