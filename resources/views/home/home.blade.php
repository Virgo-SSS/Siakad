{{-- @extends('layouts.navbar') --}}
@extends('layouts.sidebar')

@section('content')

<div class="container text-center">
    <div class="row text-center">
      <!-- List item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Admin</h5>
          <span class="small text-uppercase text-muted">30</span>
          <ul class="social mb-0 list-inline mt-3">
            <a href="{{ route('admin') }}">
              <button class="bg-primary">INFO</button>

            </a>
          </ul>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Dosen</h5>
          <span class="small text-uppercase text-muted">30</span>
          <ul class="social mb-0 list-inline mt-3">
            <a href="{{ route('dosen') }}">
              <button class="bg-primary">INFO</button>

            </a>
          </ul>
        </div>
      </div>
     
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Mahasiswa</h5>
            <span class="small text-uppercase text-muted">30</span>
            <ul class="social mb-0 list-inline mt-3">
              <a href="{{ route('pelajar') }}">
                <button class="bg-primary">INFO</button>
  
              </a>
            </ul>
        </div>
      </div>
     
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Karyawan</h5>
            <span class="small text-uppercase text-muted">30</span>
            <ul class="social mb-0 list-inline mt-3">
              <a href="{{ route('karyawan') }}">
                <button class="bg-primary">INFO</button>
  
              </a>
            </ul>
        </div>
      </div>
      <!-- End List Item-->

    </div>
  </div>

@endsection