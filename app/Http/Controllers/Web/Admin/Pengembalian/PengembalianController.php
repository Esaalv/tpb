<?php

namespace App\Http\Controllers\Web\Admin\Pengembalian;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Permohonan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        $dataPengembalian = Pengembalian::simplePaginate(5)->groupBy('permohonans_id');
        return view('pages.admin.pengembalian.index', compact('dataPengembalian'));
    }

    public function update(Request $request, $permohonanId)
    {
        $request->validate([
            'status_pengembalian' => 'required|in:Diterima,Ditolak,Menunggu',
        ]);

        DB::transaction(function () use ($request, $permohonanId) {
            // Ambil permohonan berdasarkan ID
            $permohonan = Permohonan::findOrFail($permohonanId);

            // Ambil semua pengembalian berdasarkan nama_kegiatan dari permohonan
            $pengembalianList = Pengembalian::whereHas('permohonan', function ($query) use ($permohonan) {
                $query->where('nama_kegiatan', $permohonan->nama_kegiatan);
            })->get();

            foreach ($pengembalianList as $item) {
                $item->status_pengembalian = $request->status_pengembalian;
                $item->save();

                // Jika status pengembalian adalah "Diterima", update stok barang
                if ($request->status_pengembalian === 'Diterima') {
                    $permohonan = $item->permohonan;

                    if ($permohonan && $permohonan->barang) { // Pastikan barang ada
                        $barang = $permohonan->barang; // Karena relasi belongsTo(), cukup ambil satu

                        $stock = Stock::where('barang_id', $barang->id)->first();

                        if ($stock) {
                            $stock->stock += $permohonan->jumlah; // Update stok
                            $stock->save();
                        }
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'Semua status pengembalian dan stok barang berhasil diperbarui.');
    }
}
