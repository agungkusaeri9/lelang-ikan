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
                        <h6>Data Member</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Nama</th>
                                <th>ID Telegram</th>
                                <th>Email</th>
                                <th>No. Hp</th>
                                <th>Kode Prop</th>
                                <th>Kode Kota</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->id_telegram_user }}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->no_hp}}</td>
                                <td>{{ $item->kode_prop}}</td>
                                <td>{{ $item->kode_kota}}</td>
                                <td>{{ $item->alamat}}</td>
                                <td>
                                    @if ($item->status = 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('trash.member.restore', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-info">Restore</button>
                                    </form>
                                    <form action="{{ route('trash.member.destroy.permanent', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus Permanen</button>
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