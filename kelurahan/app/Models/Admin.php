<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    
    public $rememberTokenName = false;

    protected $fillable = [
        'username', 'nama', 'email', 'password', 'role'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
