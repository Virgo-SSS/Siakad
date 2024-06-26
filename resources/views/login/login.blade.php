@extends('login.main')

@section('login_content')
<div class="global-container">

    <div class="dropdown-content">
        {{-- MAU DI JADIKAN DROPDOWN --}}
        <div class="dropdown-content">
            <a href="{{ route('language', 'id') }}">
                <img src="https://img.icons8.com/color/48/000000/indonesia-circular.png" width="20px"/> Indonesia
            </a>
            <a href="{{ route('language', 'en') }}">
                <img src="https://img.icons8.com/color/48/000000/usa-circular.png" width="20px"/> English
            </a>
        </div>
    </div>
	<div class="card login-form" style="border-radius: 10px; box-shadow:0px 6px 12px">
        <div class="card-body">
            <h3 class="card-title text-center"> {{ __('lang.welcome_to_siakad')  }}</h3>
            
            <div class="card-text">
                <form action="{{ route('loginsubmit') }}" method="POST" id="login_form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required onblur=validate_email(this.value) class="form-control form-control-sm" aria-describedby="emailHelp">
                        <span id="email_error" style="color: red"></span>
                    </div>
                     
                    <div class="form-group mt-3">
                        <label for="password">{{ __('lang.password') }}</label>
                        <input type="password" name="password" id="password" required onblur=validate_password(this.value) class="form-control form-control-sm" >
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <a href="{{ route('forgotpassword') }}" style="float:right;font-size:15px; margin-bottom:10px">{{ __('lang.forgot_password?') }}</a>
                        <span id="password_error" style="color:red"></span>
                    </div>

                    @if(session()->has('wait30sec') || session()->has('wait1min') )
                        <button type="submit" disabled class="btn btn-primary btn-block" id="btnSubmit">{{ __('lang.login') }}</button>
                    @else
                        <button type="submit" class="btn btn-primary btn-block" id="btnSubmit">{{ __('lang.login') }}</button>
                    @endif
                    <div id="loader_login" style="text-align:center;font-size:20px"></div>

                    <div style="color:red;margin-top:4px">
                        <span id="countdown_timer_login"></span><span id="timer_cd"></span>
                    </div>
                    <div class="sign-up mt-3">
                        {{ __('lang.want_to_be_a_student?') }} <a href="{{ route('register') }}">{{ __('lang.register') }}</a>
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
