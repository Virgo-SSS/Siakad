@extends('login.login_main')

@section('login_content')
<div class="global-container">
    <div class="card login-form">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}, Silahkan <a href="{{ route('login') }}">Login</a></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <h3 class="card-title text-center">Registrasi</h3>
            <div class="card-text">
                
                <form action="{{ route('registersubmit') }}" method="POST" id="register_form">
                    @csrf
                    <div class="form-group">
                        <label for="inp">{{ __('lang.name_ktp') }}</label>
                        <input type="text" name="name" onblur="validate_name(this.value)"  class="form-control form-control-sm @error('name') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                        <span style="color:red" id="name_error"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">Email</label>
                        <input type="email" name="email" onblur="validate_email(this.value)" class="form-control form-control-sm @error('email') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                        <span style="color:red" id="email_error"></span>
                    </div>
                   
                    <div class="form-group mt-3">
                        <label for="inp">{{ __('lang.password') }}</label>
                        <input type="password" name="password" onblur="validate_password(this.value)" class="form-control form-control-sm @error('password') is-invalid @enderror" id="inp" required>
                        <span style="color:red" id="password_error"></span>
                    
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">{{ __('lang.confirm_password') }}</label>
                        <input type="password" name="confirm_password" onblur="validate_confirm_password(this.value)" class="form-control form-control-sm @error('confirm_password') is-invalid @enderror" id="inp" required>
                        <span style="color:red" id="c_password_error"></span>
                    </div>
                    <input type="number" name="isMahasiswa" value="0" hidden required>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('lang.register') }}</button>
                    <div id="loader_register"></div>
                    <div class="sign-up mt-3">
                        {{ __('lang.already_have_an_account_?') }}<a href="{{ route('login') }}">{{ __('lang.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
