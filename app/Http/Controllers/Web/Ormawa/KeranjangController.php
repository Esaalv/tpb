<?php

namespace App\Http\Controllers\Web\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('mahasiswa_id', auth()->id())
            ->with('barang.kategori')
            ->get();

        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->sum('barang_id');
        }

        return view("pages.ormawa.keranjang.index", compact("keranjang", 'dataKeranjang', 'notifikasiKeranjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_kerja' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'hari_atau_tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $keranjangItems = Keranjang::where('mahasiswa_id', auth()->id())->with('barang')->get();

        if ($keranjangItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        DB::beginTransaction();
        try {
            foreach ($keranjangItems as $item) {
                Permohonan::create([
                    'unit_kerja' => $request->unit_kerja,
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'hari_atau_tanggal' => $request->hari_atau_tanggal,
                    'waktu_mulai' => $request->waktu_mulai,
                    'waktu_selesai' => $request->waktu_selesai,
                    'mahasiswa_id' => auth()->id(),
                    'phone' => $request->phone,
                    'barang_id' => $item->barang_id,
                    'jumlah' => $item->jumlah,
                ]);
            }

            // Hapus semua item di keranjang setelah permohonan dibuat
            Keranjang::where('mahasiswa_id', auth()->id())->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Permohonan berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan permohonan.');
        }
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::where('id', $id)->where('mahasiswa_id', auth()->id())->firstOrFail();
        $keranjang->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang.');
    }
}
