<?php

namespace App\Http\Controllers\Web\Admin\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PenggunaController extends Controller
{
    public function index()
    {
        $mahasiswa = Ormawa::simplePaginate(5);
        return view('pages.admin.pengguna.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
            'organisasi' => 'required|string',
        ]);

        Ormawa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'organisasi' => $request->organisasi,
            'password' => Hash::make($request->password),
        ]);

        return Redirect()->back()->with('success', 'Berhasil menambahkan Mahasiswa.');
    }

    public function update(Request $request, Ormawa $mahasiswa)
    {
        $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
            'organisasi' => 'required|string',
        ]);

        $mahasiswa->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'organisasi' => $request->organisasi,
            'password' => Hash::make($request->password),
        ]);

        return Redirect()->back()->with('success', 'Berhasil mengubah Mahasiswa.');
    }

    public function destroy(Ormawa $mahasiswa)
    {
        $mahasiswa->delete();

        return Redirect()->back()->with('success', 'Berhasil menghapus Mahasiswa.');
    }
}
