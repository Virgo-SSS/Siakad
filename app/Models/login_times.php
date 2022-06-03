<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_times extends Model
{
    use HasFactory;
    protected $table = 'login_times';
    protected $guarded = ['id'];
    public $timestamps = false;
}
