<?php

namespace App\Http\Controllers\Web\Admin\Barang\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::simplePaginate('5');
        return view("pages.admin.barang.kategori.index", compact("kategori"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan kategori.');
    }

    public function update(Request $request, Kategori $data_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $data_kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui kategori.');
    }

    public function destroy(Kategori $data_kategori)
    {
        $data_kategori->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus kategori');
    }
}
