<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;


    public function Rdo()
    {
        return $this->belongsTo(dosen::class, 'id_pembuat');
    }

    public function Rkar()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan');
    }

    public function Rpel()
    {
        return $this->belongsTo(pelajar::class, 'id_pelajar');
    }

   

}
