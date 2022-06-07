<div style="display: none;" id="parents">
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
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(2)" style="float: left">{{ __('lang.previous') }}</button>
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(4)" style="float: right">{{ __('lang.next') }}</button>
</div>