<?php

namespace App\Http\Controllers\Web\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $dataKeranjang = collect();
        $notifikasiKeranjang = 0;

        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->count();
        }

        return view("pages.ormawa.informasi.index", compact('dataKeranjang', 'notifikasiKeranjang'));
    }

    public function json()
    {
        $permohonan = Permohonan::selectRaw('
                permohonans.unit_kerja,
                permohonans.nama_kegiatan,
                permohonans.status,
                MIN(permohonans.hari_atau_tanggal) as start_date,
                pengembalians.status_pengembalian
            ')
            ->leftJoin('pengembalians', 'pengembalians.permohonans_id', '=', 'permohonans.id')
            ->groupBy('permohonans.unit_kerja', 'permohonans.nama_kegiatan', 'permohonans.status', 'pengembalians.status_pengembalian')
            ->get();

        if ($permohonan->isEmpty()) {
            return response()->json([]);
        }

        $events = $permohonan->map(function ($item) {
            // Warna berdasarkan status pengembalian
            if ($item->status == 'Disetujui' && $item->status_pengembalian == 'Diterima') {
                $color = '#0000ff '; // Biru
            } elseif ($item->status == 'Disetujui') {
                $color = '#008000 '; // Hijau
            } elseif ($item->status == 'Ditolak') {
                $color = '#FF0000'; // Merah
            } else {
                $color = '#808080'; // Abu-abu (default)
            }

            return [
                'title' => $item->unit_kerja,
                'description' => $item->unit_kerja . " - " . $item->nama_kegiatan,
                'status' => $item->status,
                'start' => $item->start_date ? date('Y-m-d', strtotime($item->start_date)) : null,
                'color' => $color, // Pastikan warna dikirim
                'status_pengembalian' => $item->status_pengembalian ?? 'Belum dikembalikan',
            ];
        });

        return response()->json($events);
    }
}
