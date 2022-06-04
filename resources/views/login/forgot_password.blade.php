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
            <h3 class="card-title text-center"> {{ __('lang.forgot_password')  }}</h3>
      
            <div class="card-text">
                <form action="#" method="POST" id="login_form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required onblur=validate_email(this.value) class="form-control form-control-sm" aria-describedby="emailHelp">
                        <span id="email_error" style="color: red"></span>
                    </div>
                       
                    <button type="submit" class="btn btn-primary btn-block" onclick="uiModal('COMING SOON')" id="btnSubmit">{{ __('lang.submit') }}</button>
                    <div id="loader_login" style="text-align:center;font-size:20px"></div>

                    <div style="color:red;margin-top:4px">
                        <span id="countdown_timer_login"></span><span id="timer_cd"></span>
                    </div>
                    <div class="sign-up mt-3">
                        <a href="{{ route('login') }}">{{ __('lang.login') }}</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
