{{-- JS FUNCTION --}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
 {{-- <script src="https://kit.fontawesome.com/9fd8223cdb.js" ></script> --}}
 
@include('js_function_global')

<script>
    $(document).ready(function() {
        // LOGIN
        form('login_form','loader_login',function(r){
            if(r.status == 200){
                uiModal(r.message);
                window.location.href = "{{ route('home') }}";
            }
            if(r.status == 401){
                uiModal(r.message);
            }
           
            if(r.status == 400){
                if(r.message){
                    var msg = JSON.stringify(r.message);
                    var msg = JSON.parse(msg);
                    if(msg.empty_email){
                        $('#email_error').html(msg.empty_email);
                    }else if(msg.invalid_email){
                        $('#email_error').html(msg.invalid_email);
                    }else if(msg.email_not_found){
                        $('#email_error').html(msg.email_not_found);
                    }else {
                        $('#email_error').html('');
                    }

                    if(msg.empty_password){
                        $('#password_error').html(msg.empty_password);
                    }else{
                        $('#password_error').html('');
                    }
                    
                    if(msg.invalid_password){
                        $('#password_error').html(msg.invalid_password);

                    }else{
                        $('#password_error').html('');
                    }
                }
            }
           
        });


        // REGISTER
        form('register_form','loader_register', function(r){
            if(r.status == 200){
                uiModal(r.message);
                location.href = "{{ route('login') }}";
            }
            
            if(r.status == 400){
                if(r.message){
                    var msg = JSON.stringify(r.message);
                    var msg = JSON.parse(msg);
                    if(msg.email_registered){
                        $('#email_error').html(msg.email_registered);
                    }else {
                        $('#email_error').html('');
                    }
                }
            }
            
        });
    });
</script>

<script>
    function validate_name(name) {
        let str = name;
        if(str == ''){
            $('#name_error').html('{{ __("lang.empty_name") }}');
        }else{
            $('#name_error').html('');
        } 
    }
    
</script>