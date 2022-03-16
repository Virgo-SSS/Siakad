<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpelajar extends Model
{
    use HasFactory;

    public function Rregis()
    {
        return $this->belongsTo(registrasi::class, 'regis_id');
    }
}
