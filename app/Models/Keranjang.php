<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';

    protected $fillable = ['barang_id', 'mahasiswa_id', 'jumlah'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Ormawa::class,'mahasiswa_id');
    }
}
