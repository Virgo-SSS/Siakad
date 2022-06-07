<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\aspiration;
use Illuminate\Http\Request;
use App\Repository\GlobalRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AspirationController extends Controller
{
    public function __construct()
    {
        $this->data = new GlobalRepository;
    }

    public function index()
    {
        $data = $this->data->getAppData();

        if(Auth::check()){
            if(Auth::user()->type == 'PMB') Config(['global.aspirationPath' => 'pmb']);
            if(Auth::user()->type == 'MHS') Config(['global.aspirationPath' => 'student']);
           
            return view('aspiration', $data);
        }
    }

    public function store(Request $request)
    {
        $validate = $this->aspirationValidate($request->all());

        if($validate){
            if($validate->fails()){
                return response()->json([
                    'status' => 400,
                    'message' => $validate->errors()
                ]);
            }
        }
     
        // status 
        // 0 = open
        // 1 = progress
        // 2 = close
        aspiration::create([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 0,
            'created_by' => auth()->user()->id,
        ]);

        return response()->json([
            'status' => 200,
            'message' => trans('lang.thank_you_aspiration')
        ]);
    }

    private function aspirationValidate($data)
    {
        $rules = [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];

        $message = [
            'category.required' => trans('lang.catergory_required'),
            'title.required' => trans('lang.title_required'),
            'description.required' => trans('lang.description_required')
        ];
        $validator = Validator::make($data, $rules,$message);

        $validator->after(function($validator){
            if(!$validator){
                $checkUserSubmit = aspiration::where('created_by', auth()->user()->id)
                                            ->where('status', 0)
                                            ->whereDate('created_at', '=', Carbon::today()->toDateString())
                                            ->count();
                
                if($checkUserSubmit >= 3)
                    $validator->errors()->add('aspiration', trans('lang.submit_only_3_times'));
            }
            
        });

        return $validator;
    }
}
