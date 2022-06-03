<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nim',
        'isActive',
        'isMahasiswa',
    ];

    public function aspirations()
    {
        return $this->hasMany(aspirations::class);
    }

    public function biodata()
    {
        return $this->hasOne(biodata::class);
    }

    public function parents()
    {
        return $this->hasMany(parents::class);
    }


}
