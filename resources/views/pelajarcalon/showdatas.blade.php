@extends('layouts.sidebar')

@section('content')

<div class="card" style="background-color: #E9ECEF">
    <h5 class="mt-3 text-center">Biodata</h5>
    <div class="card-body">
      
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row">     
                <img src="{{ asset('storage/' . $dtl->foto) }}" alt="" width="200px" height="250px" class="mb-3" style="margin-right: auto; margin-left: auto">
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="inp" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $dtl->nama }}" class="form-control" id="inp" aria-describedby="emailHelp" readonly>
                    
                </div>
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">Jenis Kelamin</label>
                    <input type="text" value="{{ $dtl->jeniskelamin }}" class="form-control" readonly>
                </div>
            
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $dtl->email }}" class="form-control" id="inp" aria-describedby="emailHelp" readonly>
                </div>
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">Prodi</label>
                    <input type="text" value="{{ $dtl->prodi }}" class="form-control" readonly>
                
                </div>
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">No Whatsapp</label>
                    <input type="number" name="nowa" value="{{ $dtl->no_hp }}" class="form-control" id="inp" aria-describedby="emailHelp" readonly> 
                  
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-6">
                    <label for="inp" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempatlahir" value="{{ $dtl->tempat_lahir }}" class="form-control " id="inp" readonly>
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">Tanggal Lahir</label>
                    <input type="text" name="tgllahir" value="{{ $dtl->tanggal_lahir }}" class="form-control" id="inp" readonly>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-6">
                    <label for="inp" class="form-label">Agama</label>
                    <input type="text" name="agama" value="{{ $dtl->agama }}" class="form-control" id="inp" readonly>
                </div>
               
                <div class="col-6">
                    <label for="inp" class="form-label">Waktu Kuliah</label>
                    <input type="text" value="{{ $dtl->waktukuliah }}" class="form-control" readonly>
                </div>
            
            </div>
              
        </form>
    </div>
</div>


@endsection

    
 