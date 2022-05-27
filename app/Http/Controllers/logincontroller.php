<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class logincontroller extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    // LOGIN 
    public function login(Request $request)
    {
        $validate = $this->loginValidation($request->all());
        if($validate){
            return response()->json([
                'status' => 400,
                'message' => $validate,
            ]);
        }
        
        return response()->json([
            'status' => 200,
        ]);
    }

    protected function loginValidation($data)
    {
        $message = [];
        if($data['email']==''){
            $message['empty_email'] = 'Email Tidak boleh Kosong'; // email tidak boleh kosong
        }
        if($data['password'] == ''){
            $message['empty_password'] = 'Password Tidak Boleh Kosong'; // password tidak boleh kosong
        }

        $email = (string) $data['email'];
        if(!str_contains($email, '@')){
            $message['invalid_email'] = 'Email Tidak Valid'; // email tidak valid
        }

        if($data['password']){
            if(strlen($data['password']) < 6){
                $message['invalid_password'] = 'Password Kurang Dari 6 Karakter'; // password kurang dari 6 karakter
            }
        }
        return $message; 
    }

    public function logout()
    {   
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        return redirect('/login');
    }


}
