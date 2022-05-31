<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\calon_pelajar;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $validate = $this->registerValidation($request->all());
        
        $message = [];
        if ($validate->fails()) {
            foreach ($validate->errors()->toArray() as $type => $error) {
                $message[$type] = $error;
            }
            return response()->json([
                'status' => 400,
                'message' => $message
            ]);    
        }
        
        $this->create($request->all());

        return response()->json([
            'status' => 200,
            'message' => trans('lang.register_success')
        ]);
    }

    private function registerValidation($data)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
        $message = [
            'name.required'                 => trans('lang.empty_name'),
            'email.required'                => trans('lang.empty_email'),
            'email.email'                   => trans('lang.invalid_email'),
            'password.required'             => trans('lang.empty_password'),
            'password.min'                  => trans('lang.invalid_password'),
            'confirm_password.required'     => trans('lang.empty_confirm_password'),
            'confirm_password.same'         => trans('lang.invalid_confirm_pass')
        ];

        $validator = Validator::make($data,$rules,$message);

        $validator->after(function($validator) use ($data) {

            $checkEmail = User::where('email', $data['email'])
                                        ->count();

            if($checkEmail > 0) {
                $validator->errors()->add('email_registered', trans('lang.email_already_registered'));
            }

        });

        return $validator;

    }

    public function create($data)
    {
        return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'isActive' => 0,
                'isMahasiswa' => 0
            ]);
    }
}
