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
                        <h4 class="box-title">Laporanaaaa Terbaru</h4>
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
                                            
                                              <span class="badge badge-warning">
                                            @elseif($laporan_items->status == 'DITERIMA')
                                              <span class="badge badge-success">
                                            @elseif($laporan_items->status == 'DITOLAK')
                                              <span class="badge badge-danger">
                                            @else
                                              <span>
                                            @endif
                                              {{ $laporan_items->status }}
                                            </span>
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
                                    <div id="flotPie1" class="float-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div id="flotPie2" class="float-chart"></div>
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

@push('after-style')

@endpush
