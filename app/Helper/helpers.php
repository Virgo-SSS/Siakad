<?php 

// Function helper untuk update css version
function updateVersion($file)
{
    if(strpos($file,'?v=')) // cek apakah param mempunyai string "?v="
    {
        return asset($file. "?v=" . config('app.version'));
    }else {
        
        return asset($file. "?v=" . config('app.version'));
    }
}


?>