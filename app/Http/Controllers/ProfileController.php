<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\GlobalRepository;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->data = new GlobalRepository;
    }
    public function index()
    {   
        $data = $this->data->getAppData();
        return view('menu.profile.index', $data);
    }
}
