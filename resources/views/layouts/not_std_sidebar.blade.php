
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
  
        <li >
            {{-- <a href="{{ route('aspiration') }}"> --}}
            <a href="#">
                <i class="fa-solid fa-fire-flame-simple"></i> Aspiration
            </a>
        </li>
      
     
    </ul>

   
</nav>
