@extends(Config("global.userPath").'.layouts.main')

@section('content')
<div class="row ml-3">
    <div class="col-md-12">
        <form action="" method="post">
            @csrf

            {{-- FORM EDIT BIODATA--}}
            <div class="row">
                <div class="col-md-12">
                    
                    <h4 class="mt-3">
                        <i class="fa-solid fa-user-edit"></i>
                        Edit Biodata
                    </h4>
                </div>
            </div>
            <div class="row viewaccount">
                <div class="col-md-12 mt-3">
                    <div class="card shadow">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <p class="card-text mt-1">Nama</p>
                                    <p class="card-text mt-3">NIM</p>
                                    <P class="card-text mt-1">Jenis Kelamin</P>
                                    <p class="card-text mt-3">Agama</p>
                                    <p class="card-text mt-1">Kelas</p>
                                   
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="nama" readonly>
                                    <input type="text" name="nim" class="mt-2" readonly>
                                    <input type="text" name="jeniskelamin" class="mt-2" readonly>
                                    <input type="text" name="agama" class="mt-2" readonly>
                                    <input type="text" name="kelas" class="mt-2" readonly>
                                </div>
            
                                <div class="col-md-2">
                                    <p class="card-text">Email</p>
                                    <p class="card-text mt-1">Handphone</p>
                                    <P class="card-text mt-1">Tempat Lahir</P>
                                    <p class="card-text mt-1">Tanggal Lahir</p>
                                    <p class="card-text mt-1">Waktu Kuliah</p>
                                </div>
                                <div class="col-md-3">
                                    <input type="email" name="email">
                                    <input type="text" name="handphone" class="mt-2">
                                    <input type="text" name="tempatlahir" class="mt-2" readonly>
                                    <input type="text" name="tgllahir" class="mt-2" readonly>
                                    <input type="text" name="waktukuliah" class="mt-2" readonly>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>   
            </div>

            @if(config('global.userPath') == 'student')
                {{-- FORM EDIT ORANG TUA --}}
                <div class="row mt-5">
                    <div class="col-md-12">
                        
                        <h4 class="mt-3">
                            <i class="fa-solid fa-user-edit"></i>
                            Edit Data Orang Tua
                        </h4>
                    </div>
                </div>
                <div class="row viewaccount">
                    <div class="col-md-12 mt-3">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="card-text">Nama Ayah</p>
                                        <p class="card-text">NIK Ayah</p>
                                        <P class="card-text">Tanggal Lahir Ayah</P>
                                        <p class="card-text">No. Telp Ayah</p>
                                        <p class="card-text">Email Ayah</p>
                                        <p class="card-text">Pendidikan Terakhir Ayah</p>
                                        <p class="card-text">Penghasilan Ayah</p>
                                    
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="nama" readonly>
                                        <input type="text" name="nim" class="mt-2" readonly>
                                        <input type="text" name="jeniskelamin" class="mt-2" readonly>
                                        <input type="text" name="agama" class="mt-2" readonly>
                                        <input type="text" name="kelas" class="mt-2" readonly>
                                        <input type="text" name="kelas" class="mt-2" readonly>
                                        <input type="text" name="kelas" class="mt-2" readonly>
                                    </div>
                
                                    <div class="col-md-2">
                                        <p class="card-text">Nama Ibu</p>
                                        <p class="card-text">NIK Ibu</p>
                                        <P class="card-text">Tanggal Lahir Ibu</P>
                                        <p class="card-text">No. Telp Ibu</p>
                                        <p class="card-text">Email Ibu</p>
                                        <p class="card-text">Pendidikan Terakhir Ibu</p>
                                        <p class="card-text">Penghasilan Ibu</p>
                                    
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" name="email">
                                        <input type="text" name="handphone" class="mt-2">
                                        <input type="text" name="tempatlahir" class="mt-2" readonly>
                                        <input type="text" name="tgllahir" class="mt-2" readonly>
                                        <input type="text" name="waktukuliah" class="mt-2" readonly>
                                        <input type="text" name="waktukuliah" class="mt-2" readonly>
                                        <input type="text" name="waktukuliah" class="mt-2" readonly>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    </div>   
                </div>

            @endif
            
            <div class="form-group mt-3">
                <button class="btn btn-primary" type="submit" style="float: right">
                    <i class="fa-solid fa-save"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection