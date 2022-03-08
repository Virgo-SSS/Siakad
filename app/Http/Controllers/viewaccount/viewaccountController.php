<?php

namespace App\Http\Controllers\viewaccount;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class viewaccountController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('viewaccount.index');
    }
    
    public function create()
    {
        return view('viewaccount.edit');
    }
}

