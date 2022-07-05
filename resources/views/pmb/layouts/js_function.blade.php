{{-- JS FUNCTION --}}

<!-- jQuery CDN + datatable js -->
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"  ></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"  ></script>

{{-- FONT AWESOME --}}
<script src="https://kit.fontawesome.com/9fd8223cdb.js" ></script>

{{-- sidebar JS --}}
<script src="{{ asset('js/sidebar.js') }}"></script>

@include('js_function_global')



<script>
    
    form('aspirationForm', 'aspirationLoader', function(r){
        if(r.status == 200){
            $('#aspirationAlertsContent').html(r.message);
            $('#aspirationAlerts').removeClass('alert-danger').addClass('alert-success');
            $('#aspirationAlerts').css('display', 'block');
            $('#aspirationAlerts').show().delay(8000).fadeOut();
        }
        if(r.status == 400){
            if(r.message){
                $.each(r.message, function(key, value){
                    $('#'+key).html(value);
                });
                
                let msg = JSON.stringify(r.message);
                let msg_arr = JSON.parse(msg);
                for(let i in msg_arr){
                    if(i == 'aspiration'){
                        $('#aspirationAlertsContent').html(msg_arr[i]);
                        $('#aspirationAlerts').removeClass('alert-success').addClass('alert-danger');
                        $('#aspirationAlerts').css('display', 'block');
                        $('#aspirationAlerts').show().delay(8000).fadeOut();
                    }
                }
            }
            
        }
    });

    form('pmbForm','pmbLoader',function(r){
        if(r.status == 200){
            uiModal(r.message);
            // pageScroll();
            
        }
        if(r.status == 401){
            if(r.message){
                uiModal(r.message);
            }
        }

        if(r.status == 400){
            if(r.message){
                $.each(r.message, function(key, value){
                    if(key == 'mother_jobs' || key =='mother_name' || key == 'mother_phone'){
                        $('#M'+key+'_error').html(value);
                    }
                    if(key == 'father_jobs' || key =='father_name' || key == 'father_phone'){
                        $('#F'+key+'_error').html(value);
                    }
                    $('#'+key+'_error').html(value);
                });
            }
        }
        
    });
</script>

<script>
    function modalPMB(){
        $('#PMBmodal').modal('show');
    }

    function submitPMB()
    {
        $('#pmbForm').submit();
        $('#PMBmodal').modal('hide');
    }
 
    function pageScroll() {
        window.scrollBy(1,0);
        scrolldelay = setTimeout(pageScroll,10);
    }
    function validate_title(str){
        let str2 = str;
        if(str2 == ''){
            $(`#title`).html('{{ __("lang.title_required") }}');
        }else{
            $(`#title`).html('');
        }
    }

    function validate_description(str){
        let str2 = str;
        if(str2 == ''){
            $(`#description`).html('{{ __("lang.description_required") }}');
        }else{
            $(`#description`).html('');
        }
    }

</script>

{{-- Function For validation form PMB --}}
<script>
    function pmbValidation(code,str)
    {
        let index = code;
        let val = str;
        if(index == 'nik'){
            if(val == ''){
                $(`#nik_error`).html('{{ __("lang.nik_required") }}');
            }else if(val.length < 16){
                $(`#nik_error`).html('{{ __("lang.invalid_nik") }}');
            }else{
                $(`#nik_error`).html('');
            }
        }

        if(index == 'POB'){
            if(val == ''){
                $(`#place_of_birth_error`).html('{{ __("lang.pob_required") }}');
            }else{
                $(`#place_of_birth_error`).html('');
            }
        }

        if(index == 'DOB'){
            if(val == ''){
                $(`#date_of_birth_error`).html('{{ __("lang.dob_required") }}');
            }else{
                $(`#date_of_birth_error`).html('');
            }
        }

        if(index == 'religion'){
            if(val == ''){
                $(`#religion_error`).html('{{ __("lang.religion_required") }}');
            }else{
                $(`#religion_error`).html('');
            }
        }

        if(index == "phone"){
            if(val == ''){
                $(`#phone_error`).html('{{ __("lang.phone_required") }}');
            }else{
                $(`#phone_error`).html('');
            }
        }

        if(index == "province"){
            if(val == ''){
                $('input[id=city]').attr('disabled', true).val('');
                $('input[id=district]').attr('disabled', true).val('');
                $('#province_error').html('{{ __("lang.province_required") }}');
                $(`#city_error`).html('');
                $(`#district_error`).html('');
                $('#citys').empty();
                $('#districts').empty();
            }else{
                $(`#province_error`).html('');
            }
        }
        if(index == "city"){
            if(val == ''){
                $('input[id=district]').attr('disabled', true).val('');
                $('#city_error').html('{{ __("lang.city_required") }}');
                $('#districts').empty();
            }else{
                $(`#city_error`).html('');
            }
        }
        if(index == "district"){
            if(val == ''){
                $('#district_error').html('{{ __("lang.district_required") }}');
            }else{
                $(`#district_error`).html('');
            }
        }

        if(index == 'address'){
            if(val == ''){
                $(`#address_error`).html('{{ __("lang.address_required") }}');
            }else{
                $(`#address_error`).html('');
            }
        }

        if(index == 'Fname'){
            if(val == ''){
                $('#Fname_error').html('{{ __("lang.empty_name") }}');
            }else{
                $('#Fname_error').html('');
            } 
        }

        if(index == "Fjobs"){
            if(val == ''){
                $(`#Fjobs_error`).html('{{ __("lang.job_required") }}');
            }else{
                $(`#Fjobs_error`).html('');
            }
        }

        if(index == "Fphone"){
            if(val == ''){
                $(`#Fphone_error`).html('{{ __("lang.phone_required") }}');
            }else{
                $(`#Fphone_error`).html('');
            }
        }

        if(index == 'Mname'){
            if(val == ''){
                $('#Mname_error').html('{{ __("lang.empty_name") }}');
            }else{
                $('#Mname_error').html('');
            } 
        }
        if(index == 'Mphone'){
            if(val == ''){
                $(`#Mphone_error`).html('{{ __("lang.phone_required") }}');
            }else{
                $(`#Mphone_error`).html('');
            }
        }
        if(index == 'Mjobs'){
            if(val == ''){
                $(`#Mjobs_error`).html('{{ __("lang.job_required") }}');
            }else{
                $(`#Mjobs_error`).html('');
            }
        }
        if(index == 'batch'){
            if(val == ''){
                $(`#batch_error`).html('{{ __("lang.batch_required") }}');
            }else{
                $(`#batch_error`).html('');
            }
        }
        if(index == 'price'){
            if(val == ''){
                $(`#price_error`).html('{{ __("lang.price_required") }}');
            }else{
                $(`#price_error`).html('');
            }
        }
        if(index == 'name_fac'){
            if(val == ''){
                $(`#name_fac_error`).html('{{ __("lang.empty_name") }}');
            }else{
                $(`#name_fac_error`).html('');
            }
        }

        if(index == 'faculty'){
            if(val == ''){
                $(`#program_of_study`).empty();
                $('#program_of_study').attr('disabled', true).val('');
                $(`#faculty_error`).html('{{ __("lang.faculty_required") }}');
            }else{
                $(`#faculty_error`).html('');
            }
        }

        if(index == 'program_of_study'){
            if(val == ''){
                $(`#program_of_study_error`).html('{{ __("lang.program_of_study_required") }}');
            }else{
                $(`#program_of_study_error`).html('');
            }
        }

        if(index == 'study_time'){
            if(val == ''){
                $(`#study_time_error`).html('{{ __("lang.study_time_required") }}');
            }else{
                $(`#study_time_error`).html('');
            }
        }

        // ACHIVEMENT DIDN'T HAD A ERROR MESSAGE, BCS NOT ALL STUDENT HAVE ACHIVEMENT
       
    }
</script>

{{-- JavaScript for paginate pmb form --}}
<script>
    let number = 1;
    let buttonMinus = document.getElementById("button-previous");
    let buttonPlus = document.getElementById("button-next");
    const pages = document.querySelectorAll(`[id^="page-"]`);
    let page1 = document.getElementById("page-biodata");
    let page2 = document.getElementById("page-contact");
    let page3 = document.getElementById("page-parents");
    let page4 = document.getElementById("page-faculty");
    let page5 = document.getElementById("page-achivement");
   
  
    const numberCheck = () => {
      let localPage = parseInt(localStorage.getItem("page"));
   
      if (localPage) {
        number = localPage;
      } else {
        number = 0;
      }
    };
    
    const numberPage = () => {
        if(number == 0) {
            $('#pg1').addClass('active');
            $('#pg2').removeClass('active');
            $('#pg3').removeClass('active');
            $('#pg4').removeClass('active');
            $('#pg5').removeClass('active');
        }else if(number == 1) {
            $('#pg1').removeClass('active');
            $('#pg2').addClass('active');
            $('#pg3').removeClass('active');
            $('#pg4').removeClass('active');
            $('#pg5').removeClass('active');
        }else if(number == 2){
            $('#pg1').removeClass('active');
            $('#pg2').removeClass('active');
            $('#pg3').addClass('active');
            $('#pg4').removeClass('active');
            $('#pg5').removeClass('active');
        }else if(number == 3){
            $('#pg1').removeClass('active');
            $('#pg2').removeClass('active');
            $('#pg3').removeClass('active');
            $('#pg4').addClass('active');
            $('#pg5').removeClass('active');
        }else if(number == 4){
            $('#pg1').removeClass('active');
            $('#pg2').removeClass('active');
            $('#pg3').removeClass('active');
            $('#pg4').removeClass('active');
            $('#pg5').addClass('active');
        }
    };

    const changingNumber = (addition = true) => {
      if (addition) {
        number += 1;
        changingPage(number);
      } else {
        number -= 1;
        changingPage(number);
      }
    };

    const changingPage = (number) => {
        if(buttonMinus && buttonPlus){

            if (number == 0) {
            buttonMinus.classList.add("pmbFormHidden");
            } else if (number == 4) {
            buttonPlus.classList.add("pmbFormHidden");
            } else {
            buttonMinus.classList.remove("pmbFormHidden");
            buttonPlus.classList.remove("pmbFormHidden");
            }

            for (var i = 0; i < pages.length; i++) {
            if (i !== number) {
                pages[i].classList.add("pmbFormHidden");
            } else {
                // console.log(i);
                pages[i].classList.remove("pmbFormHidden");
            }
            }
            numberPage();
            localStorage.setItem("page", number);
        }
        else{
            localStorage.setItem("page", 0);
        }
    };

    numberCheck();
    changingPage(number);
</script>

{{-- jAVA SCRIPT FUNCTION FOR DYNAMINC DROPDOWN PMB FORM PROVINCE DISTRICT CITY --}}
<script>
    
    $(document).ready(function() {       
        $('#province').on('change', function() {
            var value = $('#province').val();
            var cityID = $('#provinces [value="' + value + '"]').data('value');
            if(cityID) { 
                $.ajax({
                    url: '/getCity/'+cityID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#citys').empty();
                            $('#districts').empty();
                            $('input[id=city]').attr('disabled', false).val('');
                            $('input[id=district]').attr('disabled', true).val('');
                            $.each(data, function(key, city){
                                $('datalist[id="citys"]').append(`<option data-value="${city.id}" value="${city.name}">${city.name}</option>`);
                            });
                        }else{
                            $('#citys').empty();
                        }
                    }
                });
            }else{
                $('#citys').empty();
            }
        });

        $('#city').on('change', function() {
            var value2 = $('#city').val();
            var districtID = $('#citys [value="' + value2 + '"]').data('value');
            if(districtID) {
                $.ajax({
                    url: '/getDistrict/'+districtID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#districts').empty();
                            $('input[id=district]').attr('disabled', false).val('');
                            $.each(data, function(key, district){
                                $('datalist[id="districts"]').append(`<option data-value="${district.id}" value="${district.name}">${district.name}</option>`);
                            });
                        }else{
                            $('#districts').empty();
                        }
                    }
                });
            }else{
                $('#districts').empty();
            }
            
        });

        $('#faculty').on('change', function() {
            var posID = $('#faculty').val();
            if(posID) { 
                $.ajax({
                    url: '/getpos/'+posID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#program_of_study').empty();
                            $('select[id="program_of_study"]').append(`<option value=" " disabled></option>`);
                            $('select[id=program_of_study]').attr('disabled', false).val('');
                            $.each(data, function(key, pos){
                                $('select[id="program_of_study"]').append(`<option value="${pos.id}">${pos.name}</option>`);
                            });
                        }else{
                            $('#program_of_study').empty();
                            
                        }
                    }
                });
            }else{
                $('#program_of_study').empty();
            }
        });
    });
</script>

