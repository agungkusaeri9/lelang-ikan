@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Detail Member</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Kode</th>
                            <td>{{ $item->kode_member }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $item->nama_member }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $item->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Aksi</th>
                            <td>
                                <a href="{{ route('member.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('member.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
