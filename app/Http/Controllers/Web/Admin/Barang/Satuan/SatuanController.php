<?php

namespace App\Http\Controllers\Web\Admin\Barang\Satuan;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::simplePaginate('5');
        return view("pages.admin.barang.satuan.index", compact("satuan"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_satuan" => "required",
        ]);

        Satuan::create($request->all());

        return redirect()->back()->with("success", "Satuan berhasil ditambahkan");
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            "nama_satuan" => "required",
        ]);

        $satuan->update($request->all());

        return redirect()->back()->with("success", "Satuan berhasil diubah");
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->back()->with("success", "Satuan berhasil dihapus");
    }
}
