@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Laporan</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelapor</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Nama Terlapor</th>
                                        <th>Kasus</th>
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
                                        <td>{{ $item->nama_pelapor }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->nama_terlapor }}</td>
                                        <td>{{ $item->kasus }}</td>
                                        <td>
                                        <a href="{{ route('laporan.detail', $item->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        {{-- <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a> --}}
                                        <form action="{{ route('laporan.destroy', $item->id) }}" method="post" class="d-inline">
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
                                            <td colspan="6" class="text-center p-5">Data Tidak Tersedia</td>
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