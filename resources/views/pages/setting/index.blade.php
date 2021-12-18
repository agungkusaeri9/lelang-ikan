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
                        <h6>Setting</h6>
                        <a href="{{ route('m-setting.create') }}" class="btn btn-sm btn-primary">Tambah Seting</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Name Setting</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name_setting }}</td>
                                <td>{{ $item->value }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('m-setting.edit', $item->id_setting) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('m-setting.destroy', $item->id_setting) }}" method="post" class="d-inline">
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
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush