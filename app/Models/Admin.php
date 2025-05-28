<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = ['name', 'username', 'nip', 'password'];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::creating(function ($admin) {
            $admin->password = Hash::make('@Poli' . $admin->username);
        });
    }
}
