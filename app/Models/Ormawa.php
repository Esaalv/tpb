<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\Hash;

class Ormawa extends Model
{
    use HasFactory;

    protected $table = 'ormawas';

    protected $fillable = ['name', 'nim',  'organisasi', 'password'];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::creating(function ($mahasiswa) {
            $mahasiswa->password = Hash::make('@Poli' . $mahasiswa->nim);
        });
    }
}
