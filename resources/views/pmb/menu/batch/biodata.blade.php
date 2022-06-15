<div class="pmbFormHidden" id="page-biodata">

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
                    <input type="number" name="nik" id="nik" onblur="pmbValidation('nik',this.value)" min="0" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;" class="form-control"  aria-describedby="emailHelp" required>
                    <span id="nik_error" style="color:red"></span>
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
                
                
            </div>
        
            <div class="row mt-3">
                <div class="col-6">
                    <label for="place_of_birth" class="form-label">{{ __('lang.place_of_birth') }} : </label>
                    <input type="text" name="place_of_birth" id="place_of_birth" onblur="pmbValidation('POB',this.value)" class="form-control" required>
                    <span id="place_of_birth_error" style="color:red"></span>
                </div>

                <div class="col-6">
                    <label for="date_of_birth" class="form-label">{{ __('lang.date_of_birth') }} : </label>
                    <input type="date" name="date_of_birth" id="date_of_birth" onblur="pmbValidation('DOB',this.value)" class="form-control" required>
                    <span id="date_of_birth_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="religion" class="form-label">{{ __('lang.religion') }} : </label>
                    <input type="text" name="religion" id="religion" onblur="pmbValidation('religion',this.value)" class="form-control"  required>
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
    
</div>
