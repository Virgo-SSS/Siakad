<div class="pmbFormHidden" id="page-faculty">
    <div   div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
        <h5 class="mt-3 text-center">{{ __('lang.faculty') }}</h5>
        <div class="card-body">
            
            <div class="row">
                <div class="col-6">
                    <label for="father_name" class="form-label">{{ __('lang.name_ktp') }} : </label>
                    <input type="text" disabled value="{{ Auth::user()->name }}" onblur="pmbValidation('name_fac',this.value)" class="form-control" aria-describedby="emailHelp" required>
                    <span id="name_fac_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="father_name" class="form-label">{{ __('lang.batch') }} : </label>
                    <input type="text" disabled value="{{ $ActiveBatchName }}" onblur="pmbValidation('batch',this.value)" class="form-control" required>
                    <span id="batch_error" style="color:red"></span>
                </div>
                <div class="col-6 mt-3">
                    <label for="father_name" class="form-label">{{ __('lang.price') }} : </label>
                    <input type="text" disabled value="{{ $ActiveBatchPrice }}" onblur="pmbValidation('price',this.value)" class="form-control" required>
                    <span id="price_error" style="color:red"></span>
                </div>
                
                <div class="col-6 mt-3">
                    <label for="faculty" class="form-label">{{ __('lang.faculty') }} : </label>
                    <select name="faculty" id="faculty" onblur="pmbValidation('faculty',this.value)" class="form-control" required>
                        <option selected value="" disabled></option>
                        @foreach($faculty as $fac)
                            <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                        @endforeach
                    </select>
                    <span id="faculty_error" style="color:red"></span>
                </div>
                <div class="col-6 mt-3">
                    <label for="program_of_study" class="form-label">{{ __('lang.program_studi') }} : </label>
                    <select name="program_of_study" id="program_of_study" onblur="pmbValidation('program_of_study',this.value)" disabled class="form-control" required>
                    </select>
                    <span id="program_of_study_error" style="color:red"></span>
                </div>
                <div class="col-6 mt-3">
                    <label for="study_time" class="form-label">{{ __('lang.waktu_kuliah') }} : </label>
                    <select name="study_time" id="study_time" onblur="pmbValidation('study_time',this.value)"  class="form-control" required>
                        <option value="morning">{{ __('lang.morning') }}</option>
                        <option value="night">{{ __('lang.night') }}</option>
                        <option value="shift">{{ __('lang.shift') }}</option>
                    </select>
                    <span id="study_time_error" style="color:red"></span>
                </div>
                
            </div>
                                            
        </div>
    </div>
 
    
</div>
