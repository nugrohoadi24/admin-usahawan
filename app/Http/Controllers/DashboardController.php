<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $laporan = Laporan::count();
        $permohonan = Permohonan::count();

        $laporan_success = Laporan::where('status', 'DITERIMA')->count();
        $laporan_process = Laporan::where('status', 'PROSES')->count();
        $laporan_failed = Laporan::where('status', 'DITOLAK')->count();

        $permohonan_success = Permohonan::where('status', 'DITERIMA')->count();
        $permohonan_process = Permohonan::where('status', 'PROSES')->count();
        $permohonan_failed = Permohonan::where('status', 'DITOLAK')->count();

        $laporan_item = Laporan::orderBy('id', 'DESC')->take(5)->get();
        $permohonan_item = Permohonan::orderBy('id', 'DESC')->take(5)->get();

        return view('pages.dashboard.dashboard')->with([
            'laporan' => $laporan,
            'permohonan' => $permohonan,
            'laporan_item' => $laporan_item,
            'permohonan_item' => $permohonan_item,

            'laporan_success' => $laporan_success,
            'laporan_process' => $laporan_process,
            'laporan_failed' => $laporan_failed,

            'permohonan_success' => $permohonan_success,
            'permohonan_process' => $permohonan_process,
            'permohonan_failed' => $permohonan_failed,
        ]);
    }
}
