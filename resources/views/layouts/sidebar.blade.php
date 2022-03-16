<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=0.3') }}">
    <link rel="stylesheet" href="{{ asset('css/cardhome.css?v=0.4') }}">

    {{-- DATA TABLE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"  >

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"  ></script>

    
    <!-- jQuery CDN + datatable js -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"  ></script>
    
    
    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/9fd8223cdb.js" ></script>
    
    {{-- sidebar JS --}}
    <script src="js/sidebar.js"></script>

    
</head>
<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header bg-primary text-center">
            <h3>
                <img src="{{ asset('img/spiderman.jpg') }}" alt="" width="40px" rounded style="border-radius: 20px">
                Siakad
            </h3>
        </div>

        <ul class="list-unstyled">
           
            <li >
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
            </li>
         
            @if(auth('web')->user())
            <li>
                <a href="#inputSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa-solid fa-paintbrush"></i> Data
                </a>
                <ul class="collapse list-unstyled" id="inputSubmenu">
                    <li>
                        <a href="{{ route('admin') }}">
                            <i class="fa-solid fa-user-pen"></i> Admin
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dosen') }}">
                            <i class="fa-solid fa-user-pen"></i> Dosen
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pelajar') }}">
                            <i class="fa-solid fa-chalkboard-user"></i> Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calonmahasiswa') }}">
                            <i class="fa-solid fa-user-pen"></i> Calon Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('karyawan') }}">
                            <i class="fa-solid fa-pen-ruler"></i> Karyawan
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(auth('web')->user() || auth('dosen')->user() || auth('pelajar')->user()->isMahasiswa == 1)
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa-solid fa-paintbrush"></i> Layanan Akademik
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-user-pen"></i> Perubahan Biodata
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-chalkboard-user"></i> Peminjaman Lab
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-pen-ruler"></i> Ujian Susulan
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-ticket"></i> Support Ticket
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(auth('dosen')->user() || auth('web')->user())
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> Aktivitas Mahasiswa
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> KRS Approval
                </a>
            </li>
            @endif
            
            @if(auth('dosen')->user() || auth('web')->user() || auth('pelajar')->user()->isMahasiswa == 1)
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> Office 365
                </a>
            </li>
            @endif


            @if(auth('web')->user())
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-solid fa-graduation-cap"></i> Kemahasiswaan
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-star"></i> Prestasi & Aktivitas
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-ban"></i> Pelanggaran
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-regular fa-copy"></i> Cuti Request
                            </a>
                        </li>
                    </ul>
                    
                </li>
            @endif

            @if(auth('pelajar')->user())
                @if(auth('pelajar')->user()->isMahasiswa == 1)
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-solid fa-graduation-cap"></i> Kemahasiswaan
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-star"></i> Prestasi & Aktivitas
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-ban"></i> Pelanggaran
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-regular fa-copy"></i> Cuti Request
                            </a>
                        </li>
                    </ul>
                    
                </li>
                @endif
            @endif

            @if(auth('dosen')->user() || auth('web')->user() || auth('pelajar')->user()->isMahasiswa == 1)
            <li > 
                <a href="#">
                    <i class="fa-solid fa-hand-holding-heart"></i> Academic Guidance
                </a>
            </li>
            @endif


            @if(auth('web')->user() || auth('dosen')->user())
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> Jadwal
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> Nilai Mata Kuliah
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-pen"></i> Result Kuisioner
                </a>
            </li>
            @endif


            @if(auth('web')->user())
                <li >
                    <a href="#">
                        <i class="fa-solid fa-handshake"></i> Kartu Rencana Studi
                    </a>
                </li>
                <li >
                    <a href="#">
                        <i class="fa-solid fa-calendar-check"></i> Jadwal Perkuliahan
                    </a>
                </li>
                <li  >
                    <a href="#"> 
                        <i class="fa-regular fa-calendar-days"></i>  Jadwal Ujian
                    </a>
                </li>   
            @endif

            @if(auth('pelajar')->user())
                @if(auth('pelajar')->user()->isMahasiswa == 1)
                <li >
                    <a href="#">
                        <i class="fa-solid fa-handshake"></i> Kartu Rencana Studi
                    </a>
                </li>
                <li >
                    <a href="#">
                        <i class="fa-solid fa-calendar-check"></i> Jadwal Perkuliahan
                    </a>
                </li>
                <li  >
                    <a href="#"> 
                        <i class="fa-regular fa-calendar-days"></i>  Jadwal Ujian
                    </a>
                </li>   
                @endif
            @endif

            
            
            @if(auth('web')->user())
                <li >
                    <a href="#">
                        <i class="fa-solid fa-id-card-clip"></i> Kartu Hasil Studi
                    </a>
                </li>
                <li >
                    <a href="#">
                        <i class="fa-solid fa-money-bill-1-wave"></i> Tagihan
                    </a>
                </li>
            @endif


            @if(auth('pelajar')->user() )
                @if(auth('pelajar')->user()->isMahasiswa == 1 )
                <li >
                    <a href="#">
                        <i class="fa-solid fa-id-card-clip"></i> Kartu Hasil Studi
                    </a>
                </li>
                <li >
                    <a href="#">
                        <i class="fa-solid fa-money-bill-1-wave"></i> Tagihan
                    </a>
                </li>
                @endif
            @endif


            <li >
                <a href="{{ route('aspiration') }}">
                    <i class="fa-solid fa-fire-flame-simple"></i> Aspiration
                </a>
            </li>

            @if(auth('web')->user())
            <li >
                <a href="{{ route('listaspiration') }}">
                    <i class="fa-solid fa-fire-flame-simple"></i> List Aspiration
                </a>
            </li>
            @endif
         
        </ul>

       
    </nav>

    <!-- Page Content  -->
    <div id="content">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                

                <div>
                    <ul class="nav navbar-nav">
                        <div class="dropdown" style="float:right;">
                            <button class="dropbtn">
                                @if(auth('web')->user())
                                    <img src="{{ asset('img/profile.jpg') }}" alt="" width="40px" rounded style="border-radius: 50px">
                                @endif

                                @if(auth('dosen')->user())
                                    @if(auth('dosen')->user()->foto == null)
                                        <img src="{{ asset('img/profile.jpg') }}" alt="" width="40px" rounded style="border-radius: 50px">
                                    @endif
                                    <img src="{{ asset('storage/'.auth('dosen')->user()->foto) }}" alt="" width="40px" rounded style="border-radius: 50px">
                                @endif

                                @if(auth('pelajar')->user()) 
                                    @if(auth('pelajar')->user()->isMahasiswa == 0)
                                        <img src="{{ asset('img/profile.jpg') }}" alt="" width="40px" rounded style="border-radius: 50px">
                                    @endif
                                    @if(auth('pelajar')->user()->isMahasiswa == 1)
                                        {{-- <img src="{{ asset('storage/'.auth('pelajar')->user()->foto) }}" alt="" width="40px" rounded style="border-radius: 50px"> --}}
                                        <img src="{{ asset('img/spiderman.jpg') }}" alt="" width="40px" rounded style="border-radius: 50px">
                                    @endif
                                @endif
                            </button>


                            <div class="dropdown-content">
                                <a href="#">
                                    <img src="https://img.icons8.com/color/48/000000/indonesia-circular.png" width="20px"/> Indonesia
                                </a>
                                <a href="#">
                                    <img src="https://img.icons8.com/color/48/000000/usa-circular.png" width="20px"/> English
                                </a>
                                
                                @if(auth('pelajar')->user())
                                    @if(auth('pelajar')->user()->isMahasiswa == 1)
                                    <a href="{{ route('viewaccount') }}">
                                        <i class="fa-solid fa-circle-user"></i> View Account
                                    </a>
                                    @endif
                                    
                                @endif
                                @if(auth('dosen')->user() || auth('web')->user())
                                    <a href="{{ route('viewaccount') }}">
                                        <i class="fa-solid fa-circle-user"></i> View Account
                                    </a>
                                @endif
                                
                                <a href="{{ route('logout') }}">
                                    <i class="fa-solid fa-power-off"></i> Log out
                                </a>
                            </div>
                        </div>
                        
                    </ul>
                </div>
            </div>
        </nav>
        {{-- END NAVBAR --}}


        {{-- CONTENT --}}
        <div class="content">
           @yield('content')
           
        </div>
        {{-- END CONTENT --}}
    </div>
</div>
</body>

</html>