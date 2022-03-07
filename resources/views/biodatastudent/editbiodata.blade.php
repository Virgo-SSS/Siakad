@extends('layouts.sidebar')

@section('contentform')
<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            
            <h4 class="mt-3">
                <i class="fa-solid fa-user-edit"></i>
                Edit Biodata
            </h4>
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group ">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="nama" placeholder="nama">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email</label>
                        </div>
                        <div class="col-2">
                            <input type="email" class="form-control" name="email"  placeholder="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="tgllahir" placeholder="Tanggal Lahir" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label for="">NIM</label>
                        </div>
                        <div class="col-3 ml-2">
                             <input type="text" class="form-control" name="nim" placeholder="nim">
                        </div>
                        
                        <div class="form-group ml-1">
                            <label for="">Handphone</label>
                        </div>
                        <div class="col-2">

                            <input type="number" class="form-control" name="handphone"  placeholder="No Handphone">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="tgllahir" placeholder="Tanggal Lahir" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label for="">Prodi</label>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="nama" placeholder="nama">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                        </div>
                        <div class="col-2">

                            <input type="email" class="form-control" name="email"  placeholder="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Agama</label>
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="tgllahir" placeholder="Tanggal Lahir" readonly>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
           
        </div>
    </div>
   
    
    <div class="form-group">
        <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-save"></i>
            Simpan
        </button>
    </div>
</form>
@endsection