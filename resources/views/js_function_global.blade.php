<script>
   var loader_img =  '<i class="fas fa-circle-notch fa-spin"></i>'
    function form(form,loader,fn){
        jQuery('#'+form).ajaxForm({
            beforeSubmit:function(){
                $(':submit').prop('disabled',true);
                jQuery('#'+loader).html('Loading...'+loader_img);
            },
            success:function(r){
                jQuery("#"+loader).html('');
                $(':submit').prop('disabled',false);
                if(fn!=null){fn(r);}
            }
        })
    }

    function uiModal(msg){
        $('#modalContent').html(msg);
        $('#uiModal').modal('show');
        setTimeout(() => {
            $('#uiModal').modal('hide');
        }, 2000);
    }
    function regModal(msg){
        $('#registermodalContent').html(msg);
        $('#registerModal').modal('show');
    }

</script>

<script>
  
    function validate_email(email) {
        let str = email;
        if(str == ''){
            $('#email_error').html('{{ __("lang.empty_email") }}');
        }else if(str.indexOf('@') == -1){
            $('#email_error').html('{{ __("lang.invalid_email") }}');
        }
        else{
            $('#email_error').html('');
        }
    }

    function validate_password(password) {
        let str = password;
        str = str.length;
        if(str == ''){
            $('#password_error').html('{{ __("lang.empty_password") }}');
        }else if(str < 6){
            $('#password_error').html('{{ __("lang.invalid_password") }}');
        }else{
            $('#password_error').html('');
        }
    }

    function validate_confirm_password(confirm_password) {
        let str = confirm_password;
        let str2 = $('#password').val();
        if(str == ''){
            $('#c_password_error').html('{{ __("lang.empty_confirm_password") }}');
        }else if(str != str2){
            $('#c_password_error').html('{{ __("lang.invalid_confirm_pass") }}');
        }else{
            $('#c_password_error').html('');
        }
    }
</script>