@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row ng-scope">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-body text-center">
                    <div class="frame-main">
                        <img class="center-block img-responsive rounded-circle img-thumbnail" src="{{ $laporan->foto_pelapor }}" alt="foto_pribadi" id="myFoto">
                        <div id="show_foto" class="show_foto">
                            <img class="modal-content" id="imgFoto">
                            <h4 id="caption" class="close_foto">Kembali</h4>
                        </div>
                    </div>
                    <h3 class="mt-3">{{ $laporan->nama_pelapor }}</h3>
                    <div class="py-2">
                        <p>{{ $laporan->kasus }}</p>
                    </div>
                    @if($laporan->status == 'PROSES')
                        <span class="badge bg-warning text-dark">
                    @elseif($laporan->status == 'DITERIMA')
                        <span class="badge bg-success">
                    @elseif($laporan->status == 'DITOLAK')
                        <span class="badge bg-danger">
                    @else
                        <span>
                    @endif
                        {{ $laporan->status }}
                    </span>

                    <div class="mt-2">
                    @if($laporan->status == 'DITERIMA')
                    <a href="#mymodal"
                        data-bs-toggle="modal"
                        data-bs-target="#mymodal"
                        class="btn btn-primary btn-block">
                        <i class="fa fa-check"></i>Verifikasi
                    </a>
                    @endif
                    </div>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">KTP Pelapor</h4>
                    <img class="center-block img-responsive img-thumbnail frame-photo" src="{{ $laporan->ktp_pelapor }}" alt="foto_ktp" id="myKtp">
                    <div id="show_ktp" class="show_ktp">
                        <img class="modal-content" id="imgKtp">
                        <h4 id="caption" class="close_ktp">Kembali</h4>
                    </div>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Dokumen Utama</h4>
                    @if($primary_document == 'pdf')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/pdf.png') }}" alt="">
                    @elseif($primary_document == 'doc' || $primary_document == 'docx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/doc.png') }}" alt="">
                    @elseif($primary_document == 'xlx' || $primary_document == 'xlsx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/excel.png') }}" alt="">
                    @elseif($primary_document == 'ppt' || $primary_document == 'pptx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/ppt.png') }}" alt="">
                    @elseif($primary_document == 'mp4' || $primary_document == 'mkv')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/mp4.png') }}" alt="">
                    @elseif($primary_document == 'mp3' || $primary_document == 'wav')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/mp3.png') }}" alt="">
                    @elseif($primary_document == 'zip' || $primary_document == 'rar')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/zip.png') }}" alt="">
                    @endif
                    <a href="{{ route('laporan.download_primary', $laporan->id) }}">
                        <button type="button" class="btn btn-primary mt-3">Download File</button>
                    </a>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Dokumen Pendukung</h4>
                    @if($secondary_document == 'pdf')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/pdf.png') }}" alt="">
                    @elseif($secondary_document == 'doc' || $secondary_document == 'docx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/doc.png') }}" alt="">
                    @elseif($secondary_document == 'xlx' || $secondary_document == 'xlsx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/excel.png') }}" alt="">
                    @elseif($secondary_document == 'ppt' || $secondary_document == 'pptx')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/ppt.png') }}" alt="">
                    @elseif($secondary_document == 'mp4' || $secondary_document == 'mkv')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/mp4.png') }}" alt="">
                    @elseif($secondary_document == 'mp3' || $secondary_document == 'wav')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/mp3.png') }}" alt="">
                    @elseif($secondary_document == 'zip' || $secondary_document == 'rar')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/zip.png') }}" alt="">
                    @elseif($secondary_document == 'jpg')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/jpg.png') }}" alt="">
                    @elseif($secondary_document == 'png')
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/png.png') }}" alt="">
                    @else
                        <img class="center-block img-responsive img-thumbnail frame-document" src="{{ asset('assets/image/txt.png') }}" alt="">
                    @endif
                    <a href="{{ route('laporan.download_secondary', $laporan->id) }}">
                        <button type="button" class="btn btn-primary mt-3">Download File</button>
                    </a>
                </div>
            </div>
            <div class="card card-default hidden-xs hidden-sm">
                <div class="card-body text-center">
                    <h4 class="py-3">Verifikasi Status</h4>
                    <div class="mt-2">
                    @if($laporan->status == 'PROSES')
                        <a href="{{ route('laporan.status', $laporan->id) }}?status=DITERIMA"
                            class="btn btn-success btn-block">
                            <i class="fa fa-check"></i>Set Diterima
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('laporan.status', $laporan->id) }}?status=DITOLAK"
                            class="btn btn-danger btn-block">
                            <i class="fa fa-times"></i>Set Ditolak
                        </a>
                    </div>
                    @elseif($laporan->status == 'DITOLAK')
                    <a href="{{ route('laporan.status', $laporan->id) }}?status=DITERIMA"
                        class="btn btn-success btn-block">
                        <i class="fa fa-check"></i>Set Diterima
                    </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('laporan.status', $laporan->id) }}?status=PROSES"
                            class="btn btn-warning btn-block">
                            <i class="fa fa-spinner"></i>Set Proses
                        </a>
                    </div>
                    @elseif($laporan->status == 'DITERIMA')
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('laporan.status', $laporan->id) }}?status=DITOLAK"
                            class="btn btn-danger btn-block">
                            <i class="fa fa-times"></i>Set Ditolak
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('laporan.status', $laporan->id) }}?status=PROSES"
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

<script>
var mymodal = document.getElementById('mymodal')
mymodal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var recipient = button.getAttribute('data-bs-whatever')
  var modalTitle = mymodal.querySelector('.modal-title')
  var modalBodyInput = mymodal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
})
</script>
@endsection

@section('modal')
<div class="modal fade" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog width-100">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Verifikasi Email: {{ $laporan->email_pelapor }}</h5>
    </div>
      <form action="{{ route('laporan.sendEmail') }}" method="POST">
        <div class="modal-body">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" class="form-control" id="recipient-name" value="{{ $laporan->id }}" required>
            </div>
            <div class="mb-3">
                <input type="hidden" name="email_pelapor" class="form-control" id="recipient-name" value="{{ $laporan->email_pelapor }}" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Judul:</label>
                <input type="text" name="judul" class="form-control" id="recipient-name" required>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Pesan Verifikasi:</label>
                <textarea name="pesan" class="form-control" id="message-text" required ></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Kirim Verifikasi</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection