<?php 

namespace App\Repository;

use App\Models\batch;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;

class GlobalRepository
{
    function getAppData()
    {
        $data = [];

        $data['countries'] = CountryListFacade::getlist();
        $data['batch'] = batch::all();

        if(Auth::check()){
            if(Auth::user()->type == 'PMB') Config(['global.userPath' => 'pmb']);
            if(Auth::user()->type == 'MHS') Config(['global.userPath' => 'student']);
           
        }
        
        return $data;
    }
}




?>