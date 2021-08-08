@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row ng-scope">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-body text-center">
                    <div class="frame-main">
                        <img class="center-block img-responsive rounded-circle img-thumbnail" src="{{ url($permohonan->foto_pemohon) }}" alt="foto_pribadi" id="myFoto">
                        <div id="show_foto" class="show_foto">
                            <img class="modal-content" id="imgFoto">
                            <h4 id="caption" class="close_foto">Kembali</h4>
                        </div>
                    </div>
                    <h3 class="mt-3">{{ $permohonan->nama_pemohon }}</h3>
                    <div class="py-2">
                        <p>{{ $permohonan->kepentingan }}</p>
                    </div>
                    @if($permohonan->status == 'PROSES')
                        <span class="badge bg-warning text-dark">
                    @elseif($permohonan->status == 'DITERIMA')
                        <span class="badge bg-success">
                    @elseif($permohonan->status == 'DITOLAK')
                        <span class="badge bg-danger">
                    @else
                        <span>
                    @endif
                        {{ $permohonan->status }}
                    </span>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">KTP Pelapor</h4>
                    <img class="center-block img-responsive img-thumbnail frame-photo" src="{{ url($permohonan->ktp_pemohon) }}" alt="foto_ktp" id="myKtp">
                    <div id="show_ktp" class="show_ktp">
                        <img class="modal-content" id="imgKtp">
                        <h4 id="caption" class="close_ktp">Kembali</h4>
                    </div>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Verifikasi Status</h4>
                    <div class="mt-2">
                    @if($permohonan->status == 'PROSES')
                        <a href="{{ route('permohonan.status', $permohonan->id) }}?status=DITERIMA"
                            class="btn btn-success btn-block">
                            <i class="fa fa-check"></i>Set Diterima
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('permohonan.status', $permohonan->id) }}?status=DITOLAK"
                            class="btn btn-danger btn-block">
                            <i class="fa fa-times"></i>Set Ditolak
                        </a>
                    </div>
                    @elseif($permohonan->status == 'DITOLAK')
                    <a href="{{ route('permohonan.status', $permohonan->id) }}?status=DITERIMA"
                        class="btn btn-success btn-block">
                        <i class="fa fa-check"></i>Set Diterima
                    </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('permohonan.status', $permohonan->id) }}?status=PROSES"
                            class="btn btn-warning btn-block">
                            <i class="fa fa-spinner"></i>Set Proses
                        </a>
                    </div>
                    @elseif($permohonan->status == 'DITERIMA')
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('permohonan.status', $permohonan->id) }}?status=DITOLAK"
                            class="btn btn-danger btn-block">
                            <i class="fa fa-times"></i>Set Ditolak
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('permohonan.status', $permohonan->id) }}?status=PROSES"
                            class="btn btn-warning btn-block">
                            <i class="fa fa-spinner"></i>Set Proses
                        </a>
                    </div>
                    @else
                        Tidak terdeteksi
                    @endif
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

                            <label class="col-lg-12 control-label mt-2 py-1">Provinsi</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->provinsi_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Kabupaten/Kota</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->kota_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Kecamatan</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->kecamatan_termohon }}</label>
                            </div>
                            <label class="col-lg-12 control-label mt-2 py-1">Kelurahan</label>
                            <div class="col-lg-12">
                                <label class="form-control">{{ $permohonan->kelurahan_termohon }}</label>
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

@section('script')
<script>
    var foto = document.getElementById("show_foto");
    var ktp = document.getElementById("show_ktp");

    var img_foto = document.getElementById("myFoto");
    var img_ktp = document.getElementById("myKtp");

    var modalFoto = document.getElementById("imgFoto");
    var modalKtp = document.getElementById("imgKtp");

    img_foto.onclick = function(){
      foto.style.display = "block";
      modalFoto.src = this.src;
    }

    img_ktp.onclick = function(){
      ktp.style.display = "block";
      modalKtp.src = this.src;
    }

    var close_foto = document.getElementsByClassName("close_foto")[0];
    var close_ktp = document.getElementsByClassName("close_ktp")[0];
    
    close_foto.onclick = function() { 
      foto.style.display = "none";
    }

    close_ktp.onclick = function() { 
      ktp.style.display = "none";
    }
    </script>
    @endsection