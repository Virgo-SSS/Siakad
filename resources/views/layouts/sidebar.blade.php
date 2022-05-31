<nav id="sidebar">
    <div class="sidebar-header bg-primary text-center">
        <h3>
            <img src="{{ asset('img/campus_profile.jpg') }}" alt="" width="40px" rounded style="border-radius: 20px">
            Siakad
        </h3>
    </div>

    <ul class="list-unstyled">
       
        <li >
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
  
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
      
        <li>
            <a href="#">
                <i class="fa-solid fa-user-pen"></i> Office 365
            </a>
        </li>
     
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
            </ul>
            
        </li>
     
        <li>
            {{-- <a href="{{ route('cuti') }}"> --}}
            <a href="#">
                <i class="fa-regular fa-copy"></i> Cuti Request
            </a>
        </li>
 
        <li > 
            <a href="#">
                <i class="fa-solid fa-hand-holding-heart"></i> Academic Guidance
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-user-pen"></i> Nilai Mata Kuliah
            </a>
        </li>
       
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

        <li >
            {{-- <a href="{{ route('aspiration') }}"> --}}
            <a href="#">
                <i class="fa-solid fa-fire-flame-simple"></i> Aspiration
            </a>
        </li>
      
     
    </ul>

   
</nav>
