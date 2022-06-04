<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo('App\Models\users', 'user_id');
    }
}
