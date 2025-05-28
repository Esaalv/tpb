<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonans';

    protected $fillable = ['unit_kerja', 'nama_kegiatan', 'hari_atau_tanggal', 'waktu_mulai', 'waktu_selesai', 'mahasiswa_id', 'phone', 'keranjang_id', 'barang_id', 'status', 'jumlah'];

    protected $casts = [
        'hari_atau_tanggal' => 'datetime',
    ];


    public function mahasiswa()
    {
        return $this->belongsTo(Ormawa::class, 'mahasiswa_id');
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'keranjang_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'permohonans_id');
    }
}
