@extends('layouts.sidebar')


@section('content')
<div class="container">
  <div class="row ml-5">
    <div class="card card-1A">
      <div class="row">
        <div class="cardsA" >
         
          <div style="position: relative; float:left">
              <img src="{{ asset('img/profile.jpg') }}" alt="" rounded width="80px" width="80px" style="border-radius: 20px">
          </div>
      
          <div class="col-10">
            
            @if(auth('web')->user())
              <h3 class="card_titleA">Hi, {{ auth('web')->user()->name }} ({{ auth('web')->user()->id }})</h3>
              <div class="card_textA">
                <p>Selamat datang di siakad, silahkan pilih menu yang tersedia.</p>
                <p>Tetap Semangat Belajar ya</p>
                  
              </div>
            @endif
              
            @if(auth('dosen')->user())
              <h3 class="card_titleA">Hi, {{ auth('dosen')->user()->nama }} ({{ auth('dosen')->user()->nidn }})</h3>
              <div class="card_textA">
                <p>Selamat datang di siakad, silahkan pilih menu yang tersedia.</p>
                <p>Tetap Semangat Belajar ya</p>
              </div>
            @endif     

              
            @if(auth('pelajar')->user())
              @if(auth('pelajar')->user()->isMahasiswa == 1)
              <h3 class="card_titleA">Hi, {{ auth('pelajar')->user()->name }}</h3>
              <div class="card_textA">
                <p>Selamat datang di siakad, silahkan pilih menu yang tersedia.</p>
                <p>Tetap Semangat Belajar ya</p>
              </div>
              @endif

              @if(auth('pelajar')->user()->isMahasiswa == 0)
                <h3 class="card_titleA text-center">Hi, {{ auth('pelajar')->user()->name }}</h3>
                <div class="card_textA text-center">
                  <p>Silahkan Isi Formulir Pendaftaran untuk melanjutkan pendaftaran</p>
                </div>    
              @endif
            @endif 
            

            @if(auth('karyawan')->user())
              <h3 class="card_titleA">Hi, {{ auth('karyawan')->user()->name }} ({{ auth('karyawan')->user()->id }})</h3>
              <div class="card_textA">
                <p>{{ auth('karyawan')->user()->posisi }}</p>
                <p>Selamat datang di siakad, silahkan pilih menu yang tersedia.</p>
                <p>Tetap Semangat Belajar ya</p>
              </div>
            @endif






          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row mt-3">

    @include('home.adminhome')
    @include('home.dosenhome')
    @include('home.pelajarhome')
    @include('home.calon')
    @include('home.karyawanhome')
  </div>
</div>

@endsection