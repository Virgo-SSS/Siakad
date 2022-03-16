@extends('layouts.loginmain')

@section('content')
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
                
                <form action="{{ route('registersubmit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inp">Name Sesuai KTP/Nama Lengkap</label>
                        <input type="text" name="name"  value="{{ old('name') }}" class="form-control form-control-sm @error('name') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm @error('email') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">Nomor Whatsapp</label>
                        <input type="number" name="nowa" value="{{ old('nowa') }}" min="0" class="form-control form-control-sm @error('nowa') is-invalid @enderror " id="inp" aria-describedby="emailHelp" required>
                        @error('nowa')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="inp" required>
                        @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    
                    </div>
                    <div class="form-group mt-3">
                        <label for="inp">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control form-control-sm @error('confirm_password') is-invalid @enderror" id="inp" required>
                        @error('confirm_password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                   
                    </div>
                    <input type="number" name="isMahasiswa" value="0" hidden required>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="sign-up">
                        Already have an account ? <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
