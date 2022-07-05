<?php

namespace App\Http\Controllers;


use App\Models\batch;
use App\Models\biodata;
use App\Models\faculty;
use App\Models\parents;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Repository\GlobalRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class pmbController extends Controller
{
    public function __construct()
    {
        $this->data = new GlobalRepository;
    }
    public function index($id)
    {
        $data = $this->data->getAppData();

        $findBatch = batch::where('id', $id)->first();
        if($findBatch == null || $findBatch->isActive == 0){
            return redirect()->back();
        }

        $data['ActiveBatchID'] = $findBatch->id;
        $data['ActiveBatchName'] = $findBatch->name;
        $data['ActiveBatchPrice'] = $findBatch->price;
        
        $data['province'] = Province::all();
        $data['faculty'] = faculty::all();
        return view ('pmb.menu.batch.batch_form', $data);
    }

    
    public function store(Request $request, $id)
    {
        $validate = $this->pmbValidation($request->all());

        if($validate){
            if($validate->fails()){
               
                return response()->json([
                    'status' => 400,
                    'message' => $validate->errors()
                ]);
            }
            $checkBiodata = biodata::where('user_id', Auth::user()->id)->get();
            if($checkBiodata){
                return response()->json([
                    'status' => 401,
                    'message' => trans('lang.already_input_biodata')
                ]);
            }
        }

        biodata::create([
            'user_id'           => Auth::user()->id,
            'name'              => $request->name,
            'nik'               => $request->nik,
            'email'             => $request->email,
            'citizenship'       => $request->citizenship,
            'phone'             => $request->phone,
            'place_of_birth'    => $request->place_of_birth,
            'date_of_birth'     => $request->date_of_birth,
            'religion'          => $request->religion,
        ]);

        parents::create([
            'user_id'           => Auth::user()->id,
            'type'              => 'F',
            'name'              => $request->father_name,
            'citizenship'       => $request->father_citizenship,
            'phone'             => $request->father_phone,
            'jobs'              => $request->father_jobs,
        ]);

        parents::create([
            'user_id'           => Auth::user()->id,
            'type'              => 'M',
            'name'              => $request->mother_name,
            'citizenship'       => $request->mother_citizenship,
            'phone'             => $request->mother_phone,
            'jobs'              => $request->mother_jobs,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Success'
        ]);

    }

    private function pmbValidation($data)
    {
        $rules = [
            'name'                  => 'required',
            'nik'                   => 'required|min:16|max:16',
            'email'                 => 'required|email',
            'citizenship'           => 'required',
            'religion'              => 'required',
            'gender'                => 'required',
            'phone'                 => 'required|numeric',
            'place_of_birth'        => 'required',
            'date_of_birth'         => 'required',
            'father_name'           => 'required',
            'father_citizenship'    => 'required',
            'father_jobs'           => 'required',
            'father_phone'          => 'required|numeric',
            'mother_name'           => 'required',
            'mother_citizenship'    => 'required',
            'mother_jobs'           => 'required',
            'mother_phone'          => 'required|numeric',


        ];

        $message = [
            'name.required'                  => trans('lang.empty_name'),
            'nik.required'                   => trans('lang.nik_required'),
            'nik.min'                        => trans('lang.invalid_nik'),
            'email.required'                 => trans('lang.empty_email'),
            'email.email'                    => trans('lang.invalid_email'),
            'citizenship.required'           => trans('lang.citizenship_required'),
            'religion.required'              => trans('lang.religion_required'),
            'gender.required'                => trans('lang.gender_required'),
            'phone.required'                 => trans('lang.phone_required'),
            'phone.numeric'                  => trans('lang.invalid_phone'),
            'place_of_birth.required'        => trans('lang.pob_required'),
            'date_of_birth.required'         => trans('lang.dob_required'),
            'father_name.required'           => trans('lang.empty_name'),
            'father_citizenship.required'    => trans('lang.citizenship_required'),
            'father_jobs.required'           => trans('lang.job_required'),
            'father_phone.required'          => trans('lang.phone_required'),
            'father_phone.numeric'           => trans('lang.invalid_phone'),
            'mother_name.required'           => trans('lang.empty_name'),
            'mother_citizenship.required'    => trans('lang.citizenship_required'),
            'mother_jobs.required'           => trans('lang.job_required'),
            'mother_phone.required'          => trans('lang.phone_required'),
            'mother_phone.numeric'           => trans('lang.invalid_phone')
        ];

        $validator = Validator::make($data, $rules, $message);
        
        return $validator;


    }
}
