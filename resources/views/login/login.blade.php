@extends('login.login_main')

@section('login_content')
<div class="global-container">

    <div class="dropdown-content">
        {{-- MAU DI JADIKAN DROPDOWN --}}
  
        <select onchange="changeLanguage(this.value)" >
            <img src="https://img.icons8.com/color/48/000000/indonesia-circular.png" width="20px"/>
            <option {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">English</option>
            <img src="https://img.icons8.com/color/48/000000/usa-circular.png" width="20px"/>
            <option {{session()->has('lang_code')?(session()->get('lang_code')=='id'?'selected':''):''}} value="id">Indonesia/option>
          
        </select>

    </div>

	<div class="card login-form" style="border-radius: 10px; box-shadow:0px 6px 12px">
        <div class="card-body">
            <h3 class="card-title text-center">Welcome To Siakad</h3>
            
            <div class="card-text">
                <form action="{{ route('loginsubmit') }}" method="POST" id="login_form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp">
                        <span id="email_error" style="color: red"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">{{ __('home.password') }}</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="password">
                        <a href="#" style="float:right;font-size:15px; margin-bottom:10px">Forgot password?</a>
                        <span id="password_error" style="color:red"></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" id="btnSubmit">Login</button>
                    <div id="loader_login" style="text-align:center;font-size:20px"></div>

                    <div class="sign-up mt-3">
                        Mau menjadi calon mahasiswa? <a href="{{ route('register') }}">Daftar Akun</a>
                    </div>
                    <h5 class="mt-3">Follow US</h5>

                    <div class="footer-social-icons">
                        <ul class="social-icons">
                            <li><a href="" class="social-icon aicon"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="" class="social-icon aicon"> <i class="fa fa-twitter"></i></a></li>
                            <li><a href="" class="social-icon aicon"> <i class="fa fa-youtube"></i></a></li>
                            <li><a href="" class="social-icon aicon"> <i class="fa fa-linkedin"></i></a></li>
                            <li><a href="" class="social-icon aicon"> <i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
