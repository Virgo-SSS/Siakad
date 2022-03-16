@if(auth('web')->user())
    <!-- List item-->
    <div class="col-md-3 mb-5" style="border-radius:25px;" >
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Admin</h5>
            <h4 class="text-success">{{ $admins }}</h4>
            <ul class="social mb-0 list-inline mt-3 text-center">
            
                <span class="notif2" id="notif2">
                    <a href="{{ route('admin') }}"></a>
                </span>

          
            </ul>
        </div>
    </div>

    <div class="col-md-3 mb-5" style="border-radius:25px;">
        <div class="bg-white rounded shadow-sm py-5 px-4" >
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Dosen</h5>
            <h4 class="text-success">{{ $dosen }}</h4>
            <ul class="social mb-0 list-inline mt-3">
                <span class="notif2">
                    <a href="{{ route('dosen') }}"></a>
                </span>
            </ul>
        </div>
    </div>

    <div class="col-md-3 mb-5" style="border-radius:25px; ">
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Mahasiswa</h5>
            <h4 class="text-success">{{ $pelajar }}</h4>
            <ul class="social mb-0  mt-3">
                <span class="notif2">
                    <a href="{{ route('pelajar') }}"></a>
                </span>
            </ul>
        </div>
    </div>

    <div class="col-md-3 mb-5" style="border-radius:25px; ">
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Calon Mahasiswa</h5>
            <h4 class="text-success">{{ $pelajar2 }}</h4>
            <ul class="social mb-0  mt-3">
                <span class="notif2">
                    <a href="{{ route('calonmahasiswa') }}"></a>
                </span>
            </ul>
        </div>
    </div>

    <div class="col-md-3 mb-5" style="border-radius:25px;">
        <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Karyawan</h5>
            <h4 class="text-success">{{ $karyawan }}</h4>
            <ul class="social mb-0  mt-3">
                <span class="notif2">
                    <a href="{{ route('karyawan') }}"></a>
                </span>
            </ul>
        </div>
    </div>
    <!-- End List Item-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <img src="//placehold.it/200" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <div class="card-block px-2">
                            <h4 class="card-title">Notif</h4>
                            <p class="card-text">Description</p>
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer w-100 text-muted">
                    Footer stating cats are CUTE little animals
                </div>
          </div>
        </div>
       
        
    </div>
@endif
    

