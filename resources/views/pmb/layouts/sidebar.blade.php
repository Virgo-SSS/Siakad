
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
                <i class="fa-solid fa-house"></i> {{ __('lang.dashboard') }}
            </a>
        </li>
        <li >
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i> {{ __('lang.batch') }}
            </a>
        </li>
        
        <li >
            <a href="{{ route('aspiration') }}">
                <i class="fa-solid fa-fire-flame-simple"></i> {{ __('lang.aspiration') }}
            </a>
        </li>     
    </ul>

   
</nav>
