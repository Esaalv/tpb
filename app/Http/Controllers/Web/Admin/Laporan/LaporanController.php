<?php

namespace App\Http\Controllers\Web\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Pengembalian::simplePaginate(5)->groupBy('permohonans_id');
        return view('pages.admin.laporan.index', compact('laporan'));
    }

    public function exportPdf()
    {
        $laporan = Pengembalian::all()->groupBy('permohonans_id');
        $pdf = PDF::loadView('pages.admin.laporan.pdf', compact('laporan'))->setPaper('A4', 'portrait');
        return $pdf->download('laporan_pengembalian.pdf');
    }
}
