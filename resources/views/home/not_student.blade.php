@extends('layouts.main')


@section('content')
    @if(auth('web')->check())
        @if(auth('web')->user()->isMahasiswa == 0)
            @if(auth('web')->user()->isActive == 0)
                <h2 style="text-align: center;margin-bottom:3px">HALLO, SELAMAT DATANG {{ strtoupper(Auth::user()->name) }}</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-exclamation-triangle"></i>
                                        Akun Anda Belum Diaktifkan
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <p>
                                       Hallo {{ Auth::user()->name }}, selamat datang di siakad kampus ABCDEF
                                       silahkan isi formulir pendaftaran di bawah untuk melanjutkan proses pendaftaran
                                       harap isi formulir pendaftaran dengan benar dan jelas
                                       Terima kasih.
                                        <br>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3">{{ __('lang.pls_fill_regis_data_form') }}</h3>
                   
                    <form action="{{ route('biodata.store') }}" method="post" id="biodataForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
                            <h5 class="mt-3 text-center">Biodata</h5>
                        
                            <div class="card-body" style="margin-bottom: 20px">                              
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name" class="form-label">{{ __('lang.name_ktp') }} : </label>
                                        <input type="text" name="name" id="name" onblur="validate_name(this.value)" class="form-control" aria-describedby="emailHelp" required>
                                        <span id="name_error" style="color:red"></span>
                                    </div>
                                    <div class="col-6">
                                        <label for="nik" class="form-label">NIK : </label>
                                        <input type="number" name="nik" id="nik" onblur="validateNIK(this.value)" min="0" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;" class="form-control"  aria-describedby="emailHelp" required>
                                        <span id="nik_error" style="color:red"></span>
                                    </div>
                                    
                                    <div class="col-6 mt-3">
                                        <label for="email" class="form-label">Email : </label>
                                        <input type="email" name="email" id="email" onblur="validate_email(this.value)" class="form-control"  aria-describedby="emailHelp" required>
                                        <span id="email_error" style="color:red"></span>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label for="citizenship" class="form-label">{{ __('lang.citizenship') }} : </label>
                                        <select name="citizenship" id="citizenship" class="form-control" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label for="gender" class="form-label">{{ __('lang.gender') }} : </label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="L">{{ __('lang.male') }}</option>
                                            <option value="P">{{ __('lang.female') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-6  mt-3">
                                        <label for="phone" class="form-label">{{ __('lang.no_whatsapp') }} : </label>
                                        <input type="number" name="phone" id="phone" min="0" onblur="validatePhone(this.value)" class="form-control"  aria-describedby="emailHelp" required> 
                                        <span id="phone_error" style="color:red"></span>
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    
                                    <div class="col-6">
                                        <label for="place_of_birth" class="form-label">{{ __('lang.place_of_birth') }} : </label>
                                        <input type="text" name="place_of_birth" id="place_of_birth" onblur="validatePOB(this.value)" class="form-control" required>
                                        <span id="place_of_birth_error" style="color:red"></span>
                                    </div>

                                    <div class="col-6">
                                        <label for="date_of_birth" class="form-label">{{ __('lang.date_of_birth') }} : </label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" onblur="validateDOB(this.value)" class="form-control" required>
                                        <span id="date_of_birth_error" style="color:red"></span>
                                    </div>

                                    <div class="col-6">
                                        <label for="religion" class="form-label">{{ __('lang.religion') }} : </label>
                                        <input type="text" name="religion" id="religion" onblur="validateReligion(this.value)" class="form-control"  required>
                                        <span id="religion_error" style="color:red"></span>
                                    </div>

                                    {{-- for upload image is discountinued for temporary until image storage and admin app done --}}
                                    {{-- <div class="row mt-3">
                                        <div class="col-6">
                                            <label for="inp" class="form-label">Image (4x5, background biru/merah)</label>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inp">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
                            <h5 class="mt-3 text-center">{{ __('lang.father_data') }}</h5>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-6">
                                        <label for="father_name" class="form-label">{{ __('lang.name_ktp') }} : </label>
                                        <input type="text" name="father_name" id="father_name" onblur="validateFName(this.value)" class="form-control" aria-describedby="emailHelp" required>
                                        <span id="Fname_error" style="color:red"></span>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label for="father_citizenship" class="form-label">{{ __('lang.citizenship') }} : </label>
                                        <select name="father_citizenship" id="father_citizenship" class="form-control" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="father_phone" class="form-label">{{ __('lang.no_whatsapp') }} : </label>
                                        <input type="number" name="father_phone" id="father_phone" onblur="validateFPhone(this.value)" min="0" class="form-control"  aria-describedby="emailHelp" required> 
                                        <span id="Fphone_error" style="color:red"></span>
                                    </div>
                                    <div class="col-6">
                                        <label for="father_jobs" class="form-label">{{ __('lang.jobs') }} : </label>
                                        <input type="text" name="father_jobs" id="father_jobs" onblur="validateFJobs(this.value)" class="form-control" aria-describedby="emailHelp" required> 
                                        <span id="Fjobs_error" style="color:red"></span>
                                    </div>
                                </div>
                                                       
                            </div>
                        </div>
                        <div class="card" style="background-color: #E9ECEF">
                            <h5 class="mt-3 text-center">{{ __('lang.mother_data') }}</h5>
                            <div class="card-body">
                                  
                                <div class="row">
                                    <div class="col-6">
                                        <label for="mother_name" class="form-label">{{ __('lang.name_ktp') }} : </label>
                                        <input type="text" name="mother_name" id="mother_name" onblur="validateMName(this.value)" class="form-control"  aria-describedby="emailHelp" required>
                                        <span id="Mname_error" style="color:red"></span>
                                    </div>
                        
                                    <div class="col-6">
                                        <label for="mother_citizenship" class="form-label">{{ __('lang.citizenship') }} : </label>
                                        <select name="mother_citizenship" id="mother_citizenship" class="form-control" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="mother_phone" class="form-label">{{ __('lang.no_whatsapp') }} : </label>
                                        <input type="number" name="mother_phone" id="mother_phone" onblur="validateMPhone(this.value)" min="0" class="form-control"  aria-describedby="emailHelp" required> 
                                        <span id="Mphone_error" style="color:red"></span>
                                    </div>

                                    <div class="col-6">
                                        <label for="mother_jobs" class="form-label">{{ __('lang.jobs') }} :</label>
                                        <input type="text" name="mother_jobs" id="mother_jobs" onblur="validateMJobs(this.value)" class="form-control"  aria-describedby="emailHelp" required> 
                                        <span id="Mjobs_error" style="color:red"></span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div id="biodataLoader"></div>
                        <button type="submit" class="btn btn-primary mt-3" style="float: right">{{ __('lang.submit') }}</button>
                    </form>
                </div>
            @else            
                Anda telah Melakukan Registrasi, silahkan login menggunakan akun dari kampus yang di 
                kirim melalui email

                Ada Kendala ? Hubungi Kami
            @endif
        @endif
    @endif

@endsection