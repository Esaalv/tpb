<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = "stocks";

    protected $fillable = ['stock', 'barang_id', 'status_barang'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
