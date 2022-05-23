@extends('layouts.sidebar')

@section('content')
<h3>Dosen</h3>
<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        <form action="{{ route('updatedosen', $karyawan->id) }}" method="post">
            @method('PUT')
            @csrf
            @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <label for="inp" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $karyawan->name }}" class="form-control @error('name') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inp">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="inp" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $karyawan->email }}" class="form-control @error('email') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required> 
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">No HP</label>
                    <input type="number" name="nohp" value="{{ $karyawan->nohp }}" class="form-control @error('nohp') is-invalid @enderror" id="inp" required>
                    @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                
                </div>
            </div>
            
        <div class="row mt-3">
                <div class="col-6">
                    <label for="inp" class="form-label">Alamat</label>
                    <input type="text" name="alamat" value="{{ $karyawan->alamat }}"  class="form-control" id="inp" >
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-6">
                    <input type="number" value="2" hidden name="role" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>



@endsection