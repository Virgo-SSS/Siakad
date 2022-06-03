<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\login_times;
use Illuminate\Http\Request;
use App\Models\calon_pelajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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

            if($validate == 402){
                return response()->json([
                    'status' => 402,
                    'message' => trans('lang.already_wrong_pass_8_times')
                ]);
            }
            if($validate == 403){
                // note : ada problem ketika key nya pakai angka, yaitu tiap refresh lgsng berubah jadi 0,
                // pas pakai string baru bisa key nya tetap sama

                // session()->put('423', trans('lang.countdown_timer_login'));
                if(Session::has('wait30sec')){
                    return response()->json([
                        'status' => 403,
                    ]);
                }else{
                    Session::push('wait30sec',trans('lang.countdown_timer_login') );   
                    return response()->json([
                        'status' => 403,
                    ]);    
                }
            }
            if($validate == 433){
                if(Session::has('wait1min')){
                    return response()->json([
                        'status' => 403,
                    ]);                    
                }else{
                    // note : ada problem ketika key nya pakai angka, yaitu tiap refresh lgsng berubah jadi 0,
                    // pas pakai string baru bisa key nya tetap sama

                    Session::push('wait1min', trans('lang.countdown_timer_login'));
                    return response()->json([
                        'status' => 403,
                    ]);
                }
            }
           
            return response()->json([
                'status' => 400,
                'message' => $validate,
            ]);
        }

        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $checkLGN = login_times::where('user_id', Auth::user()->id)->first();
            if($checkLGN){
                $checkLGN->times = 0;
                $checkLGN->save();
            }
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
       
        if($checkUser) { 

            $checkPassword = Hash::check($data['password'], $checkUser->password);

            if(!$checkPassword){
                $checkLGN = login_times::where('user_id', $checkUser->id)->first();
                if($checkLGN){
                    if($checkLGN->times < 8 && Carbon::parse($checkLGN->created_date)->toDateString() == date('Y-m-d')){
                        $checkLGN->times = $checkLGN->times + 1;
                        $checkLGN->created_date = date('Y-m-d H:i:s');
                        $checkLGN->save();
                    }

                    $LGNtimes = [8,9];
                    if(in_array($checkLGN->times, $LGNtimes)  && Carbon::parse($checkLGN->created_date)->toDateString() == date('Y-m-d')){
                        $checkLGN->times = $checkLGN->times + 1;
                        $checkLGN->created_date = date('Y-m-d H:i:s');
                        $checkLGN->save();
                        return 402;
                    }
                    
                    $LGNtimes2 = [10,11];
                    if(in_array($checkLGN->times,$LGNtimes2) && Carbon::parse($checkLGN->created_date)->toDateString() == date('Y-m-d')){
                        $checkLGN->times = $checkLGN->times + 1;
                        $checkLGN->created_date = date('Y-m-d H:i:s');
                        $checkLGN->save();
                        return 403;
                    }

                    if($checkLGN->times >= 12 && Carbon::parse($checkLGN->created_date)->toDateString() == date('Y-m-d')){
                        $checkLGN->times = $checkLGN->times + 1;
                        $checkLGN->created_date = date('Y-m-d H:i:s');
                        $checkLGN->save();
                        return 433;
                    }

                    if(Carbon::parse($checkLGN->created_date)->toDateString() != date('Y-m-d')){
                        $checkLGN->times = 1;
                        $checkLGN->created_date = date('Y-m-d H:i:s');
                        $checkLGN->save();
                    }
                }else{
                    login_times::create([
                        'user_id' => $checkUser->id,
                        'type' => 'LGN',
                        'times'=> 1,
                        'created_date' => date('Y-m-d H:i:s'),
                    ]);
                }
  
                return 401;
            };
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

    public function destroyLoginSession()
    {
        session()->forget(['wait1min','wait30sec']);

    }
}
