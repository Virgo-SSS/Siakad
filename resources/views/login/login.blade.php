@extends('layouts.loginmain')

@section('content')
<div class="global-container">
	<div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Welcome To Siakad</h3>
            <div class="card-text">
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('loginadmin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        <a href="#" style="float:right;font-size:15px;">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    <div class="sign-up">
                        Mau menjadi calon mahasiswa? <a href="{{ route('register') }}">Daftar Akun</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection