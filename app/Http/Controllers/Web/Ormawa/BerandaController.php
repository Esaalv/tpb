<?php

namespace App\Http\Controllers\Web\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $dataBarang = Barang::when($search, function ($query) use ($search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%');
        })->simplePaginate(6);

        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->sum('barang_id');
        }

        return view('pages.ormawa.beranda.index', compact('dataBarang', 'search', 'dataKeranjang', 'notifikasiKeranjang'));
    }

    public function show($nama_barang)
    {
        $barang = Barang::where('nama_barang', $nama_barang)->first();

        if (auth()->check()) {
            $dataKeranjang = Keranjang::where('mahasiswa_id', auth()->id())
                ->with('barang')
                ->get();

            // Hitung jumlah total item di keranjang
            $notifikasiKeranjang = $dataKeranjang->sum('barang_id');
        }

        return view('pages.ormawa.beranda.detail.index', compact('barang', 'dataKeranjang', 'notifikasiKeranjang'));
    }
    public function store(Request $request, $nama_barang)
    {
        $barang = Barang::where('nama_barang', $nama_barang)->firstOrFail();
        $mahasiswa = Auth::user();

        // Cek apakah stok kosong
        if ($barang->stock->stock <= 0) {
            return redirect()->back()->with('error', 'Barang sedang habis, tidak dapat menambah ke keranjang.');
        }

        // Validasi jumlah agar tidak melebihi stok yang tersedia
        $jumlah = $request->jumlah;
        if ($jumlah > $barang->stock->stock) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        // Tambahkan ke keranjang jika stok mencukupi
        Keranjang::create([
            'barang_id' => $barang->id,
            'mahasiswa_id' => $mahasiswa->id,
            'jumlah' => $jumlah,
        ]);

        return redirect()->route('beranda')->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }
}
