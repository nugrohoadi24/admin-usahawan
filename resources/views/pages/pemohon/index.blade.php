@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Permohonan</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemohon</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Nama Termohon</th>
                                        <th>Kepentingan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                    ?>
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_pemohon }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->nama_termohon }}</td>
                                        <td>{{ $item->kepentingan }}</td>
                                        <td>
                                            @if($item->status == 'PROSES')
                                              <span class="badge bg-warning text-dark">
                                            @elseif($item->status == 'DITERIMA')
                                              <span class="badge bg-success">
                                            @elseif($item->status == 'DITOLAK')
                                              <span class="badge bg-danger">
                                            @else
                                              <span>
                                            @endif
                                              {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('permohonan.detail', $item->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <form action="{{ route('permohonan.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </form> 
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Tidak Tersedia, Silahkan Verifikasi Terlebih Dahulu!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>

    jQuery(document).ready(function() {
    jQuery('#dataTables').DataTable();
} );
</script>

@endsection