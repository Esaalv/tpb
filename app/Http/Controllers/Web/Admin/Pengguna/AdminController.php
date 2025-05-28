<?php

namespace App\Http\Controllers\Web\Admin\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::simplePaginate('5');
        return view('pages.admin.pengguna.admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|string',
            'nip' => 'required|string',
        ]);

        Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Data Admin Berhasil Ditambahkan');
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'nip' => 'required|string',
        ]);

        $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'nip' => $request->nip,
        ]);

        return redirect()->back()->with('success', 'Data Admin Berhasil Diubah');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->back()->with('success', 'Data Admin Berhasil Dihapus');
    }
}
