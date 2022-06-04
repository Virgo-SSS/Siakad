@extends('layouts.sidebar')

@section('content')
<h3>Form Cuti</h3>
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
        <form action="{{ route('storecuti') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="inp" class="form-label">Name</label>
                   <input type="text" name='name' class="form-control" required>
                </div>
            </div>
            <div class="row">
                @if(Auth('pelajar')->user())
                <div class="col-md-12">
                    <label for="inp" class="form-label">NIM</label>
                    <input type="number" name='id_pembuat' class="form-control" required>
                </div>
                @endif
                @if(Auth('dosen')->user())
                <div class="col-md-12">
                    <label for="inp" class="form-label">NIDN</label>
                    <input type="number" name='id_pembuat' class="form-control" required>
                </div>
                @endif
                @if(Auth('karyawan')->user())
                <div class="col-md-12">
                    <label for="inp" class="form-label"></label>
                    <input type="number" name='id_pembuat' value="{{ Auth::id() }}" class="form-control" required hidden>
                </div>
                @endif
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="inp" class="form-label">Tanggal Mulai</label>
                   <input type="date" name='tanggalmulai' class="form-control" required>
                </div>
                
            </div>
            <div class="row">

                <div class="col-md-12 mt-3">
                    <label for="inp" class="form-label">Tanggal Selesai</label>
                <input type="date" name='tanggalselesai' class="form-control" required>
                </div>
           
            </div>
            
            <div class="row">

                <div class="col-md-12 mt-3">
                    <label for="inp" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control @error('keterangan') is-invaid @enderror" id="inp" aria-describedby="emailHelp" required>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="row">
                <input type="text" hidden>
            </div> --}}
            
            <input type="text" name="status" value="Proses" hidden readonly>

            <input type="text" name="id_pembuat" >
          
        
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>



@endsection