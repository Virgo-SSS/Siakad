<?php

namespace App\Http\Controllers\karyawan;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = karyawan::all();
        return view('karyawan.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.createkaryawan');
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
            'email' => 'required|email|unique:karyawans',
            'password' => 'required',
            'nohp' => 'required',
            'posisi' => 'required',
            'image' => 'image|file'
            
        ]);

        $karyawan = new karyawan;
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->password = bcrypt($request->password);
        $karyawan->nohp = $request->nohp;
        $karyawan->posisi = $request->posisi;
        if($request->file('image')){
            $karyawan->image = $request->file('image')->store('employee-img');
        }
        $karyawan->save();

        return redirect(route('karyawan'))->with('success', 'Employee Created');
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
    public function edit($id)
    {
        $karyawan = karyawan::find($id);
        return view('karyawan.editkaryawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nohp' => 'required',
            'posisi' => 'required',
            'image' => 'image|file'
            
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->password = bcrypt($request->password);
        $karyawan->nohp = $request->nohp;
        $karyawan->posisi = $request->posisi;
        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
            $karyawan->image = $request->file('image')->store('employee-img');
        }
        $karyawan->update();

        return redirect(route('karyawan'))->with('success', 'Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = karyawan::find($id);
        if($karyawan->image){
            Storage::delete($karyawan->image);
        }
        $karyawan->delete();

        return redirect(route('karyawan'))->with('success', 'Employee Deleted');
    }
}
