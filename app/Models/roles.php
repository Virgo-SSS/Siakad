<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    public function Radmin()
    {
        return $this->hasMany(User::class);
    }

    public function Rdosen()
    {
        return $this->hasMany(dosen::class);
    }
   
  
    
}

