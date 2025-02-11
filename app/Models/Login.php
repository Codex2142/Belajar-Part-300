<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Login extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'login';

    protected $fillable = [
        'username',
        'password',
        'level',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
