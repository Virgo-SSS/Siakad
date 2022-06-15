<?php 

// Function helper untuk update css version
function updateVersion($file)
{
    if(strpos($file,'?v=')) // cek apakah param mempunyai string "?v="
    {
        $file = str_replace('css/','css/'.config('global.userPath').'/',$file); // hapus string "?v="
        return asset($file. "?v=" . config('app.version'));
    }else {
        $file = str_replace('css/','css/'.config('global.userPath').'/',$file);
        return asset($file. "?v=" . config('app.version'));
    }
}
function updateVersionGlobal($file)
{
    if(strpos($file,'?v=')) // cek apakah param mempunyai string "?v="
    { 
        return asset($file. "?v=" . config('app.version'));
    }else {
        return asset($file. "?v=" . config('app.version'));
    }
}

?>