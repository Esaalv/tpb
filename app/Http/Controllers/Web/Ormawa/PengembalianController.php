<?php

namespace App\Http\Controllers\Web\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Pengembalian;
use App\Models\Permohonan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->sum('barang_id');
        }

        $dataPermohonan = Permohonan::where('mahasiswa_id', auth('ormawa')->id())
            ->get()
            ->groupBy('nama_kegiatan');

        return view("pages.ormawa.pengembalian.index", compact("dataKeranjang", "notifikasiKeranjang", "dataPermohonan"));
    }

    public function store(Request $request, $permohonanId)
    {
        $request->validate([
            'bukti_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $permohonan = Permohonan::findOrFail($permohonanId);
            $permohonans = Permohonan::where('nama_kegiatan', $permohonan->nama_kegiatan)->get();

            if ($permohonans->isEmpty()) {
                return back()->with('error', 'Data permohonan tidak ditemukan.');
            }

            // Cek apakah sudah pernah dikembalikan
            $sudahDikembalikan = Pengembalian::whereIn('permohonans_id', $permohonans->pluck('id'))->exists();
            if ($sudahDikembalikan) {
                return back()->with('error', 'Barang ini sudah dikembalikan sebelumnya.');
            }

            // Upload bukti foto
            $filePath = $request->file('bukti_foto')->store('bukti_pengembalian', 'public');

            foreach ($permohonans as $permohonan) {
                Pengembalian::create([
                    'mahasiswa_id' => $permohonan->mahasiswa_id,
                    'permohonans_id' => $permohonan->id,
                    'bukti_foto' => $filePath,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Pengembalian berhasil disimpan untuk semua permohonan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
