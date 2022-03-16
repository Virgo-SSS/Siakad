@extends('layouts.loginmain')

@section('content')
<div class="global-container">
	<div class="card login-form" style="border-radius: 10px; box-shadow:0px 6px 12px">
        <div class="card-body">
            <h3 class="card-title text-center">Welcome To Siakad</h3>
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-text">
                <form action="{{ route('loginsubmit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        <a href="#" style="float:right;font-size:15px; margin-bottom:10px">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <div class="sign-up mt-3">
                        Mau menjadi calon mahasiswa? <a href="{{ route('register') }}">Daftar Akun</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
