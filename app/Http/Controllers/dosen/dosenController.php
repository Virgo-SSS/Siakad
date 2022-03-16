<?php

namespace App\Http\Controllers\dosen;

use App\Models\dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.createdosen');
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
            'nidn' => 'required|unique:dosens',
            'name' => 'required',
            'email' => 'required|email|unique:dosens',
            'password' => 'required|min:4',
            'jeniskelamin' => 'required',
            'nohp' => 'required', 
            'image' => 'image|file',
            
        ]);

        $dosen = new dosen;
        $dosen->nidn = $request->nidn;
        $dosen->nama = $request->name;
        $dosen->email = $request->email;
        $dosen->password = bcrypt($request->password);
        $dosen->jeniskelamin = $request->jeniskelamin;
        $dosen->alamat = $request->alamat;  
        $dosen->no_hp = $request->nohp;
        $dosen->role = $request->role;  
        if($request->file('image')){
            $dosen->foto = $request->file('image')->store('dosen-img');
        }
        $dosen->save();
        
        return redirect(route('dosen'))->with('success', 'Teacher Created');
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
    public function edit($nidn)
    {
        $dosens = dosen::find($nidn);
        return view('dosen.editdosen', compact('dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nidn' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'jeniskelamin' => 'required',
            'nohp' => 'required',
            'image' => 'image',

        ]);

        $dosen = dosen::find($nidn);
        
        if($request->nidn == $dosen->nidn){
            $dosen->nama = $request->name;
            $dosen->email = $request->email;
            $dosen->jeniskelamin = $request->jeniskelamin;
            $dosen->alamat = $request->alamat;
            $dosen->no_hp = $request->nohp;
            $dosen->role = $request->role;  
            if($request->file('image')){
                if($request->oldimage){
                    Storage::delete($request->oldimage);
                }
                $dosen->foto = $request->file('image')->store('dosen-img');
            }
            $dosen->update();
        } else {
            $dosen2 = dosen::where('nidn', $request->nidn)->first();
            if($dosen2){
                return back()->with('error', 'NIDN Already Exist');
            } else {
                $dosen->nidn = $request->nidn;
                $dosen->nama = $request->name;
                $dosen->email = $request->email;
                $dosen->jeniskelamin = $request->jeniskelamin;
                $dosen->alamat = $request->alamat;
                $dosen->no_hp = $request->nohp;
                $dosen->role = $request->role;  
                if($request->file('image')){
                    if($request->oldimage){
                        Storage::delete($request->oldimage);
                    }
                    $dosen->foto = $request->file('image')->store('dosen-img');
                }
                $dosen->update();
            }
        }

        return redirect(route('dosen'))->with('success', 'Teacher Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nidn)
    {
        $dosen = dosen::find($nidn);
        if($dosen->foto){
            Storage::delete($dosen->foto);
        }
        $dosen->delete();

        return redirect(route('dosen'))->with('success', 'Teacher Deleted');
    }
}
