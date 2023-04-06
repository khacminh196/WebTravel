<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public $timestamps = false;
    public $fillable = [
        'email',
        'token',
        'time_exists',
        'created_at'
    ];
}
