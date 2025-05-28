<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Ormawa;
use App\Models\Pengembalian;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pengguna = Ormawa::count();
        $barang = Barang::count();
        $peminjaman = Permohonan::where('status', 'Menunggu')->count();
        $pengembalian = Pengembalian::where('status_pengembalian', 'Menunggu')->count();
        return view('Pages.Admin.Dashboard.index', compact('pengguna', 'barang', 'peminjaman', 'pengembalian'));
    }
}
