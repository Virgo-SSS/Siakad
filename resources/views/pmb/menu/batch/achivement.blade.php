<div class="pmbFormHidden" id="page-achievement">
    <div class="card" style="background-color: #E9ECEF;margin-bottom:30px">
        <h5 class="mt-3 text-center">{{ __('lang.achivement') }}</h5>

        <div class="card-body" style="margin-bottom: 20px">                              
            <div class="row">
                <div class="col-6">
                    <label for="old_school" class="form-label">{{ __('lang.old_school') }} : </label>
                    <input type="text" name="old_school" id="old_school" onblur="pmbValidation('old_school',this.value)" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="old_school_address" class="form-label">{{ __('lang.old_school_address') }} : </label>
                    <input type="text" name="old_school_address" id="old_school_address" onblur="pmbValidation('old_school_address',this.value)" autocomplete="off" class="form-control" required>            
                </div>
                <div class="col-6 mt-3">
                    <label for="category_achivement" class="form-label">{{ __('lang.category_achivement') }} : </label>
                    <input type="text" name="category_achivement" id="category_achivement" onblur="pmbValidation('category_achivement',this.value)" class="form-control" required>
                </div>
                <div class="col-6 mt-3">
                    <label for="achivement" class="form-label">{{ __('lang.achivement') }} : </label>
                    <input type="text" name="achivement" id="achivement" onblur="pmbValidation('achivement',this.value)" class="form-control" required>
                </div>
        </div>
    </div>
    
</div>
{{-- Button modal pmb  --}}
<button type="button" onclick="modalPMB()" class="btn btn-primary mt-3" style="float: right">{{ __('lang.submit') }}</button>
