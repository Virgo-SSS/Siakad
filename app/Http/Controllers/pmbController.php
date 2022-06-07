<?php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class pmbController extends Controller
{
    public function index($id)
    {
        $countries = CountryListFacade::getlist();
        $batch = batch::where('code', $id)->first();
        if($batch == null || $batch->isActive == 0){
            return redirect()->back();
        }
        return view ('pmb.menu.batch.batch_form', compact('id','countries','batch'));
    }
}
