<?php

namespace App\Http\Controllers\pelajar;

use App\Models\pelajar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detailpelajar;
use App\Models\registrasi;
use Illuminate\Support\Facades\Storage;

class pelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rgs2 = registrasi::where('isMahasiswa', '=', '1')->get();
        return view('pelajar.index', compact('rgs2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajar.createpelajar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:detailpelajars',
            'prodi' => 'required',
            'nowa' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'agama' => 'required',
            'waktukuliah' => 'required',
            'image' => 'required|image|file',
            

        ]);

        $detail = new detailpelajar;
        $detail->nama = $request->name;
        $detail->email = $request->email;
        $detail->prodi = $request->prodi;
        $detail->no_hp = $request->nowa;
        $detail->jeniskelamin = $request->jeniskelamin;
        $detail->tempat_lahir = $request->tempatlahir;
        $detail->tanggal_lahir = $request->tgllahir;
        $detail->agama = $request->agama;
        $detail->waktukuliah = $request->waktukuliah;
        if($request->file('image')){
            $detail->foto = $request->file('image')->store('detailpelajar-img');
        }
        $detail->regis_id = $request->regis_id;
        $detail->status = $request->status;
        $detail->save();

        return back()->with('success', 'Data Berhasil di input, Silahkan Tunggu Informasi Selanjut nya dari Tim Marketing kami di Whatsapp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $pelajar = registrasi::find($nim);
        return view('pelajar.editpelajar', compact('pelajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:registrasis',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $registrasi = new registrasi;
        $registrasi->name = $request->name;
        $registrasi->email = $request->email;
        $registrasi->no_wa = $request->nowa;
        $registrasi->password = bcrypt($request->password);
        $registrasi->confirm_password = bcrypt($request->confirm_password);
        $registrasi->isMahasiswa = $request->isMahasiswa;
        $registrasi->save();

        return back()->with('success', 'Registrasi berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $pelajar = detailpelajar::find($nim);
        if($pelajar->foto){
            Storage::delete($pelajar->foto);
        }
        $pelajar->delete();
        return redirect(route('pelajar'))->with('success', 'Student Deleted');
    }

    public function calon()
    {
        $rgs = registrasi::where('isMahasiswa', '=', '0')->get();
        return view('pelajar.calonindex', compact('rgs'));

    }


    public function showdata($id)
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
            return back()->with('error', 'Calon Mahasiswa Belum Melakukan Input Data');
        } 
        return view('pelajar.showdata', compact('dtl'));
        

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
        
        

    public function accept(Request $request, $id)
    {
        
        $request->validate([
            'nim' => 'required',

        ]);

        $dtl = detailpelajar::select('detailpelajars.*', 'registrasis.*')
        ->join('registrasis', 'registrasis.id', '=', 'detailpelajars.regis_id')
        ->where('regis_id', '=', $id)->first();

        if(!$request->nim == $dtl->nim){
            $dtl->nim  = $request->nim;
            $dtl->status = 'ACTIVE';
            $dtl->update();
        }
        

        $rgs = registrasi::find($id);
        $rgs->isMahasiswa = '1';
        $rgs->update();

        return redirect(route('calonmahasiswa'))->with('success', 'Data Berhasil di Accept');
    }

    

}
