@extends('layouts.sidebar')

@section('content')
<div class="row">
    <div class="col-md-4 mt-3">
        <div class="card shadow">
            <div class="card-header border-0 text-center mt-3">
                <img src="img/spiderman.jpg" alt="" width="150px" rounded style="border-radius:100px">
                <h4 class="mt-2">{{ auth()->user()->name }}</h4>
                <p>Sistem Informasi</p>
                <p>2121015</p>
            </div>
            <div class="card-body text-center">
              <p>{{ auth()->user()->Rroles->name }}</p>
              <a href="{{ route('editaccount') }}">
                  <button class="btn btn-outline-primary">EDIT</button>
              </a>
            </div>
        </div>
    </div>

    <div class="col-md-8 mt-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">Detail</h5>
                <div class="row">
                    <div class="col-md-4">
                        <p class="card-text">Nama</p>
                        <p class="card-text">NIM</p>
                        <P class="card-text">Jenis Kelamin</P>
                        <p class="card-text">Agama</p>
                        <p class="card-text">Kelas</p>
                        <p class="card-text">Email</p>
                        <p class="card-text">Handphone</p>
                        <p class="card-text">Tempat Lahir</p>
                        <p class="card-text">Tanggal Lahir</p>
                        <p class="card-text">Waktu Kuliah</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">: {{ auth()->user()->name }}</p>
                        <p class="card-text">: 2121015</p>
                        <p class="card-text">: Laki-Laki</p>
                        <p class="card-text">: Khatolik</p>
                        <p class="card-text">: Malam</p>
                        <p class="card-text">: {{ auth()->user()->email }}</p>
                        <p class="card-text">: 082170796602</p>
                        <p class="card-text">: Batam</p>
                        <p class="card-text">: 27 Juli 2003</p>
                        <p class="card-text">: Malam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">Data Orang Tua</h5>
                <div class="row mt-3">
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
                        <p class="card-text">: Virgo Stevanus</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: 01-01-1990</p>
                        <p class="card-text">: 082190908787</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: 1.000.000</p>
                    
                    </div>

                    <div class="col-md-3">
                        <p class="card-text">Nama Ibu</p>
                        <p class="card-text">NIK Ibu</p>
                        <P class="card-text">Tanggal Lahir Ibu</P>
                        <p class="card-text">No. Telp Ibu</p>
                        <p class="card-text">Email Ibu</p>
                        <p class="card-text">Pendidikan Terakhir Ibu</p>
                        <p class="card-text">Penghasilan Ibu</p>
                    </div>
                    <div class="col-md-3">
                        <p class="card-text">: Virgo Stevanus</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: 01-01-1990</p>
                        <p class="card-text">: 082190908787</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: -</p>
                        <p class="card-text">: 1.000.000</p>
                    </div>
                </div>

            </div>
        </div>
    </div>   
</div>


@endsection