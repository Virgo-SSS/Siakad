@extends('login.main')

@section('login_content')
<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
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
            <h3 class="card-title text-center">{{ __('lang.register') }}</h3>
            <div class="card-text">
                
                <form action="{{ route('registersubmit') }}" method="POST" id="register_form">
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('lang.name_ktp') }}</label>
                        <input type="text" name="name" id="name" onblur="validate_name(this.value)"  class="form-control form-control-sm"  aria-describedby="emailHelp" required>
                        <span style="color:red" id="name_error"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" onblur="validate_email(this.value)" class="form-control form-control-sm"  aria-describedby="emailHelp" required>
                        <span style="color:red" id="email_error"></span>
                    </div>
                   
                    <div class="form-group mt-3">
                        <label for="password">{{ __('lang.password') }}</label>
                        <input type="password" name="password"  id="password" onblur="validate_password(this.value)" class="form-control form-control-sm"  required>
                        <span style="color:red" id="password_error"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="confirm_password">{{ __('lang.confirm_password') }}</label>
                        <input type="password" name="confirm_password" id="confirm_password" onblur="validate_confirm_password(this.value)" class="form-control form-control-sm"  required>
                        <span style="color:red" id="c_password_error"></span>
                    </div>
    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('lang.register') }}</button>
                    <div id="loader_register" style="text-align: center"></div>
                    
                    <div class="sign-up mt-3">
                        {{ __('lang.already_have_an_account_?') }}<a href="{{ route('login') }}">{{ __('lang.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
