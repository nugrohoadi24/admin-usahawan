@extends('layouts.default')

@section('content')

<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <span class="iconify" data-icon="fa-solid:address-card" data-inline="false"></span>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">{{ $laporan }} Orang</span></div>
                                <div class="stat-heading">Laporan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <span class="iconify" data-icon="fa-solid:clipboard" data-inline="false"></span>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">{{ $permohonan }} Orang</span></div>
                                <div class="stat-heading">Permohonan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="orders">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Laporan Terbaru</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table DataTable" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                    ?>
                                    @forelse ($laporan_item as $laporan_items)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $laporan_items->nama_pelapor }}</td>
                                        <td>{{ $laporan_items->created_at }}</td>
                                        <td>{{ $laporan_items->kategori }}</td>
                                        <td>
                                            @if($laporan_items->status == 'PROSES')
                                              <span class="badge bg-warning text-dark">
                                            @elseif($laporan_items->status == 'DITERIMA')
                                              <span class="badge bg-success">
                                            @elseif($laporan_items->status == 'DITOLAK')
                                              <span class="badge bg-danger">
                                            @else
                                              <span>
                                            @endif
                                              {{ $laporan_items->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('laporan.detail', $laporan_items->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Tidak Tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div class="mb-3">
                                        <label>Statistik Laporan</label>
                                    </div>
                                    <span class="badge bg-success"><label>DITERIMA</label></span> &nbsp; {{ $laporan_success }}<br>
                                    <span class="badge bg-warning"><label>PROSES</label></span> &nbsp;&nbsp;&nbsp;&nbsp; {{ $laporan_process }}<br>
                                    <span class="badge bg-danger"><label>DITOLAK</label></span> &nbsp;&nbsp; {{ $laporan_failed }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="orders">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Permohonan Terbaru</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table DataTable" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                    ?>
                                    @forelse ($permohonan_item as $permohonan_items)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $permohonan_items->nama_pemohon }}</td>
                                        <td>{{ $permohonan_items->created_at }}</td>
                                        <td>{{ $permohonan_items->kategori }}</td>
                                        <td>
                                            @if($permohonan_items->status == 'PROSES')
                                              <span class="badge bg-warning text-dark">
                                            @elseif($permohonan_items->status == 'DITERIMA')
                                              <span class="badge bg-success">
                                            @elseif($permohonan_items->status == 'DITOLAK')
                                              <span class="badge bg-danger">
                                            @else
                                              <span>
                                            @endif
                                              {{ $permohonan_items->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('permohonan.detail', $permohonan_items->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Tidak Tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div class="mb-3">
                                        <label>Statistik Permohonan</label>
                                    </div>
                                    <span class="badge bg-success"><label>DITERIMA</label></span> &nbsp; {{ $permohonan_success }}<br>
                                    <span class="badge bg-warning"><label>PROSES</label></span> &nbsp;&nbsp;&nbsp;&nbsp; {{ $permohonan_process }}<br>
                                    <span class="badge bg-danger"><label>DITOLAK</label></span> &nbsp;&nbsp; {{ $permohonan_failed }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection