<?php 

namespace App\Repository;

use App\Models\batch;
use Monarobase\CountryList\CountryListFacade;

class GlobalRepository
{
    function getAppData()
    {
        $data = [];

        $data['countries'] = CountryListFacade::getlist();
        $data['batch'] = batch::all();

        return $data;
    }
}




?>