<?php

namespace App\Http\Controllers\Web\Admin\Permohonan;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Stock;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        $dataPermohonan = Permohonan::simplePaginate(5)->groupBy('nama_kegiatan');
        return view("pages.admin.permohonan.index", compact('dataPermohonan'));
    }

    public function update(Request $request, $permohonanId)
    {
        // Ambil permohonan berdasarkan ID
        $permohonan = Permohonan::findOrFail($permohonanId);

        // Cari semua permohonan dengan nama_kegiatan yang sama
        $permohonanList = Permohonan::where('nama_kegiatan', $permohonan->nama_kegiatan)->get();

        // Ambil status dari request
        $status = $request->input('status');

        if ($status == 'Disetujui') {
            // Ambil semua barang_id yang terkait dengan mahasiswa ini
            $barangIds = $permohonanList->pluck('barang_id')->unique();

            foreach ($barangIds as $barangId) {
                // Cari stok barang
                $stock = Stock::where('barang_id', $barangId)->first();

                // Hitung total jumlah peminjaman untuk barang ini
                $totalDipinjam = $permohonanList->where('barang_id', $barangId)->sum('jumlah');

                if ($stock && $stock->stock >= $totalDipinjam) {
                    // Kurangi stok berdasarkan jumlah total peminjaman
                    $stock->stock -= $totalDipinjam;
                    $stock->save();
                } else {
                    return redirect()->back()->with('error', 'Stok tidak mencukupi untuk barang yang dipinjam.');
                }
            }
        }

        // Update semua permohonan mahasiswa tersebut
        foreach ($permohonanList as $p) {
            $p->status = $status;
            $p->save();
        }

        return redirect()->back()->with('success', 'Berhasil memperbarui status permohonan.');
    }
}
