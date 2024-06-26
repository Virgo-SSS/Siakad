<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class dosen extends Authenticatable
{
    use HasFactory;

    protected $table = 'dosens';
    protected $primaryKey = 'nidn';
    public $incrementing = false;

    public function Rroles()
    {
        return $this->belongsTo(roles::class, 'role');
    }
}
