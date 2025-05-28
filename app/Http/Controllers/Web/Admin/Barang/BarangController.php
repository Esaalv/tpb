<?php

namespace App\Http\Controllers\Web\Admin\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::simplePaginate('5');
        $kategoris = Kategori::lazy();
        $satuans = Satuan::lazy();
        return view("pages.admin.barang.index", compact("barangs", "kategoris", "satuans"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_barang" => "required|string",
            "foto" => "nullable|mimes:png,jpg|max:5148",
            "kategori_id" => "required|exists:kategoris,id",
            "satuan_id" => "required|exists:satuans,id",
        ]);

        $fotoPath = $request->hasFile("foto")
            ? $request->file("foto")->store("uploads/barang", "public")
            : null;

        $barang = Barang::create([
            "nama_barang" => $request->nama_barang,
            "foto" => $fotoPath,
            "kategori_id" => $request->kategori_id,
            "satuan_id" => $request->satuan_id,
        ]);

        Stock::create([
            "barang_id" => $barang->id,
            "stock" => $request->stock,
        ]);

        return redirect()->route('barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request, Barang $data_barang)
    {
        $request->validate([
            "nama_barang" => "required|string",
        ]);

        $data_barang->nama_barang = $request->nama_barang;
        $data_barang->save();

        return redirect()->route('barang')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $data_barang)
    {
        if ($data_barang->foto) {
            Storage::disk('public')->delete($data_barang->foto);
        }

        $data_barang->delete();
        return redirect()->route('barang')->with('success', 'Barang berhasil dihapus');
    }
}
