@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row ng-scope">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-body text-center">
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($laporan->foto_pelapor) }}" alt="">
                    <h3 class="mt-3">{{ $laporan->nama_pelapor }}</h3>
                    <div class="py-2">
                        <p>{{ $laporan->kasus }}</p>
                    </div>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">KTP Pelapor</h4>
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($laporan->ktp_pelapor) }}" alt="">
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Dokumen Utama</h4>
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($laporan->ktp_pelapor) }}" alt="">
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Dokumen Pendukung</h4>
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($laporan->ktp_pelapor) }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    <div class="py-3">
                        <h4>Informasi Pelapor</h4>
                    </div>
                    <div class="row pv-lg">
                        <div class="col-lg-12">
                            <label class="col-lg-12 control-label py-1">Nama</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->nama_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Jenis Kelamin</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->jenis_kelamin_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Tanggal Lahir</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->tanggal_lahir_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">No Telepon</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->no_telp_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Email</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->email_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Alamat</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->alamat_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Nama Pembina</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->nama_pembina_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Nama Ketua DPD Domisili</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->nama_dpd_pelapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Tanggal Transaksi</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->tanggal_transaksi }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Total Hutang</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->total_kerugian }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-body">
                    <div class="py-3">
                        <h4>Informasi Terlapor</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-12 control-label py-1">Nama</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->nama_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Jenis Kelamin</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->jenis_kelamin_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">No Telepon</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->no_telp_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Email</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->email_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Alamat</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->alamat_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Nama Ketua DPD Domisili</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->nama_dpd_terlapor }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Kasus</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->kasus }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Penyelesaian</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->penyelesaian }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Uraian Kasus</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $laporan->uraian_kasus }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection