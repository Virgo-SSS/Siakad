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

<script type="text/javascript">
  
    function changeLanguage(lang){
        window.location='{{ route("language") }}/'+lang;
    }
  
</script>