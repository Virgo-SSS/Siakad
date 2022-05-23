<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\dosen;
use App\Models\roles;
use App\Models\karyawan;
use App\Models\registrasi;
use Illuminate\Http\Request;
use App\Models\detailpelajar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();
        return view('admin.indexadmin', compact('admins'));
    }

    public function indexdosen()
    {
        $dosens = dosen::all();
        return view('admin.indexdosen', compact('dosens'));
    }

    public function indexkaryawan()
    {
        $employees = karyawan::all();
        return view('admin.indexkaryawan', compact('employees'));
    }

    public function indexpelajar()
    {
        $rgs2 = registrasi::where('isMahasiswa', 1)->get();
        return view('admin.indexpelajar', compact('rgs2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.createadmin');
    }


    public function createdosen()
    {
        return view('admin.createdosen');
    }

    public function createkaryawan()
    {
        return view('admin.createkaryawan');
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
            'email' => 'required',
            'password' => 'required',
            
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('admin')->with('success', 'Admin Created');
    }


    // Store Dosen
    public function storedosen(Request $request)
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
        $dosen->name = $request->name;
        $dosen->email = $request->email;
        $dosen->password = bcrypt($request->password);
        $dosen->jeniskelamin = $request->jeniskelamin;
        $dosen->alamat = $request->alamat;  
        $dosen->no_hp = $request->nohp;
        if($request->file('image')){
            $dosen->image = $request->file('image')->store('dosen-img');
        }
        $dosen->save();
        
        return redirect(route('dosen'))->with('success', 'Teacher Created');
    }

    // store karyawan
    public function storekaryawan(Request $request)
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
        $karyawan->no_hp = $request->nohp;
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
        $admins = User::find($id);
        
        return view('admin.editadmin', compact('admins'));
    }

    public function editdosen($nidn)
    {
        $dosens = dosen::find($nidn);
        return view('admin.editdosen', compact('dosens'));
    } 

    public function editkaryawan($id)
    {
        $karyawan = karyawan::find($id);
        return view('admin.editkaryawan', compact('karyawan'));
    }

    public function editpelajar($nim)
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect(route('admin'))->with('success', 'Admin Updated');
    }


    // UPDATE DOSEN
    public function updatedosen(Request $request, $nidn)
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


    // Update karyawan
    public function updatekaryawan(Request $request, $id)
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

    // update pelajar
    public function updatepelajar(Request $request, $id)
    {
        
        $pelajar = registrasi::find($id);
        $pelajar->name = $request->name;
        $pelajar->email = $request->email;
        $pelajar->no_wa = $request->no_wa;
        $pelajar->update();

        return redirect(route('pelajar'))->with('success', 'Student Updated');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($id == Auth::id()) {
            return redirect(route('admin'))->with('error', 'You cannot delete yourself');
        } else
        {
            $user->delete();
            return redirect(route('admin'))->with('success', 'Admin Deleted');
        }
      
    }

    public function destroydosen($nidn)
    {
        $dosen = dosen::find($nidn);
        if($dosen->foto){
            Storage::delete($dosen->foto);
        }
        $dosen->delete();

        return redirect(route('dosen'))->with('success', 'Teacher Deleted');
    }

    public function destroykaryawan($id)
    {
        $karyawan = karyawan::find($id);
        if($karyawan->image){
            Storage::delete($karyawan->image);
        }
        $karyawan->delete();

        return redirect(route('karyawan'))->with('success', 'Employee Deleted');
    }


    public function destroypelajar($nim)
    {
        $pelajar = detailpelajar::find($nim);
        if($pelajar->foto){
            Storage::delete($pelajar->foto);
        }
        $pelajar->delete();
        return redirect(route('pelajar'))->with('success', 'Student Deleted');
    }
   

}
