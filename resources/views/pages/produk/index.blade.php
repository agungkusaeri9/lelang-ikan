@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Berhasil !</strong>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Data Produk</h6>
                        <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th>Farm</th>
                                <th>DOB</th>
                                <th>Sertifikat</th>
                                <th>Panjang</th>
                                <th>OB</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $item->foto() }}" alt="" class="img-fluid" style="max-height: 80px;max-width:80px">
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis}}</td>
                                <td>{{ $item->deskripsi}}</td>
                                <td>{{ $item->farm}}</td>
                                <td>{{ $item->DOB}}</td>
                                <td>{{ $item->certi}}</td>
                                <td>{{ $item->panjang}}</td>
                                <td>{{ $item->OB}}</td>
                                <td>{{ $item->created_by}}</td>
                                <td>{{ $item->updated_by}}</td>
                                <td>
                                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true
        });
    } );
</script>
@endpush