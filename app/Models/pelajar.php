<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelajar extends Model
{
    use HasFactory;

    protected $table = 'pelajars';
    protected $primaryKey = 'nim';
    public $incrementing = false;
}

