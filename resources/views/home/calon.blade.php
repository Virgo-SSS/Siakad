@if(auth('registrasi')->user())
    @if(auth('registrasi')->user()->isMahasiswa == 0)
    <h3 class="mt-3">Silahkan Isi Formulir Di bawah ini</h3>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    <div class="card" style="background-color: #E9ECEF">
        <h5 class="mt-3 text-center">Biodata</h5>
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('formulirpelajar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                            <label for="inp" class="form-label">Nama sesuai KTP</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    <div class="col-6">
                        <label for="inp" class="form-label">Jenis Kelamin</label>
                        <select name="jeniskelamin" id="inp" class="form-control" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                
                    <div class="col-6 mt-3">
                        <label for="inp" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invaid @enderror" id="inp" aria-describedby="emailHelp" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6 mt-3">
                        <label for="inp" class="form-label">Kewarganegaraan</label>
                        <select name="prodi" id="inp" class="form-control" required>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    
                </div>
               
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="inp" class="form-label">No Whatsapp</label>
                        <input type="number" name="nowa" value="{{ old('nowa') }}" class="form-control @error('nohp') is-invalid @enderror" id="inp" aria-describedby="emailHelp" required> 
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inp" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" value="{{ old('tempatlahir') }}" class="form-control @error('tempatlahir') is-invalid @enderror" id="inp" required>
                        @error('tempatlahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-6">
                        
                        <label for="inp" class="form-label">Agama</label>
                        <input type="text" name="agama" value="{{ old('agama') }}" class="form-control @error('agama') is-invalid @enderror" id="inp" required >
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
                    <div class="col-6">
                        <label for="inp" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgllahir" class="form-control @error('tgllahir') is-invalid @enderror" id="inp" required style="width: 390px">
                        @error('tgllahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="inp" class="form-label">Image (4x5, background biru/merah)</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inp">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                </div>

                <input type="number" hidden readonly name="regis_id" value="{{ Auth::id() }}">
                <input type="text" hidden readonly name="status" value="INACTIVE">
                
                <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
            </form>
        </div>
    </div>
   
        
    @else
        
    Anda telah Melakukan Registrasi, silahkan login menggunakan akun dari kampus
    @endif
   

    
    
@endif