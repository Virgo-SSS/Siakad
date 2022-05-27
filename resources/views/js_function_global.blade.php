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
</script>

<script>
  
    function validate_email(email) {
        let str = email;
        if(str == ''){
            $('#email_error').html('Email tidak boleh kosong');

        }else if(str.indexOf('@') == -1){
            $('#email_error').html('Email tidak valid');
        }
        else{
            $('#email_error').html('');
        }
    }

    function validate_password(password) {
        let str = password;
        str = str.length;
        if(str == ''){
            $('#password_error').html('Password tidak boleh kosong');

        }else if(str < 6){
            $('#password_error').html('Password Kurang dari 6 Character')
        }else{
            $('#password_error').html('');
        }
    }

    function validate_confirm_password(confirm_password) {
        let str = confirm_password;
        let str2 = $('#password').val();
        if(str == ''){
            $('#c_password_error').html('Konfirmasi password tidak boleh kosong');

        }else if(str != str2){
            $('#c_password_error').html('Konfirmasi password tidak sama');
        }else{
            $('#c_password_error').html('');
        }
    }
</script>