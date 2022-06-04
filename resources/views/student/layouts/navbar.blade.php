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
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="" width="40px" rounded style="border-radius: 50px">
                    </button>
                    <div class="dropdown-content">
                        @if(config('app.locale') == 'en')
                            <a href="{{ route('language', 'id') }}">
                                <img src="https://img.icons8.com/color/48/000000/indonesia-circular.png" width="20px"/> Indonesia
                            </a>
                        @else
                            <a href="{{ route('language', 'en') }}">
                                <img src="https://img.icons8.com/color/48/000000/usa-circular.png" width="20px"/> English
                            </a>
                        @endif
                        <a href="{{ route('profile') }}">
                            <i class="fa-solid fa-circle-user"></i> Profile
                        </a>
                        <a href="{{ route('logout') }}">
                            <i class="fa-solid fa-power-off"></i> {{ __("lang.logout") }}
                        </a>
                    </div>
                </div>
                
            </ul>
        </div>
    </div>
</nav>
{{-- END NAVBAR --}}

