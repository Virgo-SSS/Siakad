<div style="display: none;" id="contact">

    <div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
        <h5 class="mt-3 text-center">{{ __('lang.contact') }}</h5>

        <div class="card-body" style="margin-bottom: 20px">                              
            <div class="row">
                
                <div class="col-6 mt-3">
                    <label for="email" class="form-label">Email : </label>
                    <input type="email" name="email" id="email" onblur="validate_email(this.value)" class="form-control"  aria-describedby="emailHelp" required>
                    <span id="email_error" style="color:red"></span>
                </div>
                <div class="col-6  mt-3">
                    <label for="phone" class="form-label">{{ __('lang.no_whatsapp') }} : </label>
                    <input type="number" name="phone" id="phone" min="0" onblur="validatePhone(this.value)" class="form-control"  aria-describedby="emailHelp" required> 
                    <span id="phone_error" style="color:red"></span>
                </div>
                <div class="col-6 mt-3">
                    <label for="gender" class="form-label">{{ __('lang.province') }} : </label>
                    <input list="provinces"  onblur="clearCityDistrict(this.value)" id="province" class="form-control"  autocomplete="off">
                    <input type="hidden" name="province" value="">
                    <datalist id="provinces">          
                        @foreach($province as $prov)
                            <option data-value="{{ $prov->id }}" value="{{ $prov->name }}">{{ $prov->name }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-6 mt-3">
                    <label for="gender" class="form-label">{{ __('lang.city') }} : </label>
                    <input list="citys"  disabled id="city" class="form-control"  autocomplete="off">
                    <input type="hidden" name="city" value="">
                    <datalist id="citys">        
                    </datalist>
                </div>
                <div class="col-6 mt-3">
                    <label for="gender" class="form-label">{{ __('lang.districts') }} : </label>
                    <input list="districts"  disabled id="district" class="form-control" autocomplete="off">
                    <input type="hidden" name="district" value="">
                    <datalist id="districts">          
                    </datalist>
                </div>
                <div class="col-6 mt-3">
                    <label for="email" class="form-label">{{ __('lang.full_address') }} :</label>
                    <input type="email" name="email" id="email" onblur="validate_email(this.value)" class="form-control"  aria-describedby="emailHelp" required>
                    <span id="email_error" style="color:red"></span>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(1)" style="float: left">{{ __('lang.previous') }}</button>
    <button type="button" class="btn btn-primary mt-3" onclick="batchPaginateForm(3)" style="float: right">{{ __('lang.next') }}</button>
</div>