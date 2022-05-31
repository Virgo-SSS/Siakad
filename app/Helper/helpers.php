<?php 

// Function helper untuk update css version
function updateVersion($file)
{
    $file = $file;
    if(strpos($file,'?v=')) // cek apakah param mempunyai string "?v="
    {
        $version = strtok($file, '?'); // ambil semua string sebelum '?'
        $version = $version . '?v=' . config('app.version');
        return $version;
    }else {
        // kalau gk langsung tambahkan ?v=
        $version = $file . '?v=' . config('app.version');
        return $version;
    }
    
}


?>