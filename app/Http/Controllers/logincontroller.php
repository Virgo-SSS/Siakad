<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\calon_pelajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class logincontroller extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    // LOGIN 
    public function login(Request $request)
    {
        $validate = $this->loginvalidation($request->all());
        if($validate){
            if($validate == 401){
                return response()->json([
                    'status' => 401,
                    'message' => trans('lang.pass_wrong')
                ]);
            }
            return response()->json([
                'status' => 400,
                'message' => $validate,
            ]);
        }

        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => 200,
                'message' => trans('lang.keep_learning'),
            ]);
        }
        
        
    }

    private function loginvalidation($data)
    {
        $message = [];

        if(!str_contains($data['email'], '@')) $message['invalid_email'] = trans('lang.invalid_email'); // email tidak valid
    
        if($data['email'] =='') $message['empty_email'] = trans('lang.empty_email'); // email tidak boleh kosong

        if($data['password'] == '') $message['empty_password'] = trans('lang.empty_password'); // password tidak boleh kosong

        if($data['password']){
            if(strlen($data['password']) < 6) $message['invalid_password'] = trans('lang.invalid_password'); // password kurang dari 6 karakter
        }  

        $checkUser = User::where('email', $data['email'])->first(); 
        
        if(!$checkUser) $message['email_not_found'] = trans('lang.email_not_found');
       
        if($checkUser) { // Mahasiswa
            $checkPassword = Hash::check($data['password'], $checkUser->password);
            
            if(!$checkPassword) return 401;
        }
        return $message;
    }


    public function logout()
    {   
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }
        session()->invalidate();
        session()->regenerate();
        return redirect('/login');
    }


}
