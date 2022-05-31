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
<script src="js/sidebar.js"></script>

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
</script>

<script>
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

<script>
    $(document).ready( function () {
        $('#admintable').DataTable({
            searching: false,
            responsive: true,
        });
        
    } );
</script>

