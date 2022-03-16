@extends('layouts.sidebar')

@section('content')
<h3>Mahasiswa</h3>
<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('updatepelajar', $pelajar->nim) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="inp" class="form-label">NIM</label>
                    <input type="text" name="nim" value="{{ $pelajar->nim }}" class="form-control @error('nim') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                    @error('nidn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">Jenis Kelamin</label>
                    <select name="jeniskelamin" id="inp" class="form-control" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $pelajar->nama }}" class="form-control @error('name') is-invaid @enderror" id="inp" aria-describedby="emailHelp" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              
                <div class="col-6 mt-3">
                    <label for="inp" class="form-label">Alamat</label>
                    <input type="text" name="alamat" value="{{ $pelajar->alamat }}"class="form-control" id="inp" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $pelajar->email }}" class="form-control @error('email') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required> 
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">No HP</label>
                    <input type="number" name="nohp" value="{{ $pelajar->no_hp }}" class="form-control @error('nohp') is-invalid @enderror" id="inp" required>
                    @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
        <div class="row mt-3">
                
           
            <div class="col-6 mt-3">
                <label for="inp" class="form-label">Image</label>
                <input type="text" name="oldimage" value="{{ $pelajar->foto }}" hidden>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inp">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if($pelajar->foto)
                    <img src="{{ asset('storage/'.$pelajar->foto) }}" alt="" width="100px" height="100px" class="mt-3" rounded style="border-radius: 20px" >
                @endif
            
            </div>
        </div>
            
            
            <div class="row mt-3">
                <div class="col-6">
                    <input type="number" value="3" hidden name="role" class="form-control" id="inp" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>



@endsection