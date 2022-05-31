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
                        
                        {{-- <img src="#" alt="" width="40px" rounded style="border-radius: 50px"> --}}
                        <img src="{{ Avatar::create('test')->toBase64() }}" alt="" width="40px" rounded style="border-radius: 50px">
                    </button>
                    <div class="dropdown-content">
                        <a href="#">
                            <img src="https://img.icons8.com/color/48/000000/indonesia-circular.png" width="20px"/> Indonesia
                        </a>
                        <a href="#">
                            <img src="https://img.icons8.com/color/48/000000/usa-circular.png" width="20px"/> English
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-circle-user"></i> View Account
                        </a>
                    
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

