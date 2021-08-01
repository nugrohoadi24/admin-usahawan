@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row ng-scope">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-body text-center">
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($permohonan->foto_pemohon) }}" alt="">
                    <h3 class="mt-3">{{ $permohonan->nama_pemohon }}</h3>
                    <div class="py-2">
                        <p>{{ $permohonan->kepentingan }}</p>
                    </div>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">KTP Pelapor</h4>
                    <img class="center-block img-responsive rounded-circle img-thumbnail thumb96" src="{{ url($permohonan->ktp_pemohon) }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    <div class="py-3">
                        <h4>Informasi Pemohon</h4>
                    </div>
                    <div class="row pv-lg">
                        <div class="col-lg-12">
                            <label class="col-lg-12 control-label py-1">Nama</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->nama_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Jenis Kelamin</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->jenis_kelamin_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Tanggal Lahir</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->tanggal_lahir_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">No Telepon</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->no_telp_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Email</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->email_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Alamat</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->alamat_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Nama Pembina</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->nama_pembina_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Nama Ketua DPD Domisili</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->nama_dpd_pemohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Kepentingan Permohonan</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->kepentingan }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-body">
                    <div class="py-3">
                        <h4>Informasi Termohon</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="col-lg-12 control-label py-1">Nama</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->nama_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Jenis Kelamin</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->jenis_kelamin_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">No Telepon</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->no_telp_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Alamat</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->alamat_termohon }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection