<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_of_study extends Model
{
    use HasFactory;
    
    protected $table = 'program_of_study';
    protected $guarded = ['id'];
    public $timestamps = false;
}
