<?php

namespace App\Http\Controllers\pelajar;

use App\Models\User;
use App\Models\roles;
use App\Models\registrasi;
use Illuminate\Http\Request;
use App\Models\detailpelajar;
use App\Http\Controllers\Controller;

class registrasiController extends Controller
{
    
   

    public function datacalon($id)
    {
        
       
        // dd('babi');
        // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*')
        //     ->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
        //     ->where('regis_id', '=', $id)->first();
        // return view('pelajar.showdata', compact('dtl'));

        



        // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*');
        // if($id){
        //     // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*');

        //     if(empty($dtl = $dtl->where('regis_id', '=', $id)->first())){
        //         return back()->with('error', 'Data Tidak Ditemukan');
        //     }
            
        // }
        // $dtl = $dtl->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
        // ->where('regis_id', '=', $id)->first();
        // return view('pelajar.showdata', compact('dtl'));
        
        // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*')
        //     ->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
        //     ->where('regis_id', '=', $id)->first();
        // if($dtl){
        //     $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*')
        //     ->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
        //     ->where('regis_id', '=', $id)->first();
        //     return view('pelajar.showdata', compact('dtl'));
        // } else {
            
        //     return back()->with('error', 'Calon Mahasiswa Belum Melakukan Input Data');
        // }


        $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*')
            ->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
            ->where('regis_id', '=', $id)->first();
        if(empty($dtl)){
            return back()->with('error', 'Anda Belum Melakukan Input Data');
        } 
        return view('pelajar.showdatas', compact('dtl'));
        

        // $reg = registrasi::all();
        // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*');
        // $dtl->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id');
        // if($id ){
            //     $dtl->where('regis_id', '=', $id)->first();
            //     return view('pelajar.showdata', compact('dtl'));
            
            // 


            
            // $dtl = $dtl->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id');
            // $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*');


        
        // if($id){
        //     if($id === $dtl->id) {
        //     } else {
        //         return back()->with('error', 'Calon Mahasiswa ini belum Mengisi Formulir');

        //     }

        // }
            

            
        // if(!$id == $dtl->id){
            
        // 

            
    

    }

   

}
