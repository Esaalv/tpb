<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalians';

    protected $fillable = ['permohonans_id', 'mahasiswa_id', 'bukti_foto', 'status_pengembalian'];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonans_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Ormawa::class, 'mahasiswa_id');
    }
}
