<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class karyawan extends Authenticatable
{
    use HasFactory;


    public function Rroles()
    {
        return $this->belongsTo(roles::class, 'role');
    }
}
