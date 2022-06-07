
<!-- Modal GLOBAL -->
<div class="modal fade" id="uiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" >{{ __('lang.information') }}</h5>
          <button type="button" class="close" data-bs-dismiss="modal"  aria-hidden="true" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalContent">
        
        </div>
      </div>
    </div>
</div>

<!-- Modal FOR SUBMIT REGIS PMB -->
<div class="modal fade" id="PMBmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" >{{ __('lang.information') }}</h5>
        <button type="button" class="close" onclick="closeModal('PMBmodal')"  aria-hidden="true" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalContent">
      {{ __('lang.pmb_msg') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary mt-3" onclick="submitPMB()" style="float: right">{{ __('lang.submit') }}</button>
        <div id="pmbLoader"></div>
      </div>

    </div>
  </div>
</div>