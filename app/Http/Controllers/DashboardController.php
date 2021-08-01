<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $laporan = Laporan::count();
        $permohonan = Permohonan::count();

        $laporan_item = Laporan::orderBy('id', 'DESC')->take(5)->get();
        $permohonan_item = Permohonan::orderBy('id', 'DESC')->take(5)->get();

        $laporan_pie = [
            'proses' => Laporan::where('status', 'PROSES')->count(),
            'ditolak' => Laporan::where('status', 'DITOLAK')->count(),
            'diterima' => Laporan::where('status', 'DITERIMA')->count()
        ];

        $permohonan_pie = [
            'proses' => Permohonan::where('status', 'PROSES')->count(),
            'ditolak' => Permohonan::where('status', 'DITOLAK')->count(),
            'diterima' => Permohonan::where('status', 'DITERIMA')->count()
        ];
        

        return view('pages.dashboard.dashboard')->with([
            'laporan' => $laporan,
            'permohonan' => $permohonan,
            'laporan_item' => $laporan_item,
            'permohonan_item' => $permohonan_item,
            'laporan_pie' => $laporan_pie,
            'permohonan_pie' => $permohonan_pie,
        ]);
    }
}
