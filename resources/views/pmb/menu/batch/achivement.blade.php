<div class="pmbFormHidden" id="page-achievement">
    <div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
        <h5 class="mt-3 text-center">{{ __('lang.achivement') }}</h5>

        <div class="card-body" style="margin-bottom: 20px">                              
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('lang.old_school') }} : </label>
                    <input type="text" name="name" id="name" onblur="validate_name(this.value)" class="form-control" aria-describedby="emailHelp" required>
                    <span id="name_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('lang.old_school_address') }} : </label>
                    <input type="text" name="name" id="name" onblur="validate_name(this.value)" class="form-control" aria-describedby="emailHelp" required>
                    <span id="name_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('lang.category_achivement') }} : </label>
                    <input type="text" name="name" id="name" onblur="validate_name(this.value)" class="form-control" aria-describedby="emailHelp" required>
                    <span id="name_error" style="color:red"></span>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('lang.achivement') }} : </label>
                    <input type="text" name="name" id="name" onblur="validate_name(this.value)" class="form-control" aria-describedby="emailHelp" required>
                    <span id="name_error" style="color:red"></span>
                </div>
                
            </div>
        </div>
    </div>
    
    {{-- Button submit is below  --}}
    <button type="button" onclick="modalPMB()" class="btn btn-primary mt-3" style="float: right">{{ __('lang.submit') }}</button>
</div>
