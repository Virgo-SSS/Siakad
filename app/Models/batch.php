<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    use HasFactory;

    protected $table = 'batch';
    protected $guarded = ['id'];
    public $timestamps = false;
}
