<?php

namespace App\Http\Controllers\Web\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Permohonan;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->sum('barang_id');

            // Ambil data Permohonan dan Pengembalian berdasarkan mahasiswa_id
            $dataPermohonan = Permohonan::where('mahasiswa_id', auth()->id())
                ->with('barang', 'pengembalian')
                ->get();
        }

        return view("pages.ormawa.riwayat.index", compact("dataKeranjang", "notifikasiKeranjang", "dataPermohonan"));
    }
}
