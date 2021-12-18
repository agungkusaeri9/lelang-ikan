@extends('layouts.app')
@section('content')
<div class="container-fluid">
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
                            <th width="150">Nama Lengkap</th>
                            <td>{{ $item->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $item->tanggal_lahir->translatedFormat('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item->user->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Hp</th>
                            <td>{{ $item->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $item->provinsi_tempat_tinggal }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $item->kota_tempat_tinggal }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $item->alamat_tinggal }}</td>
                        </tr>
                        <tr>
                            <th>No. Transaksi</th>
                            <td>{{ $item->number_transaction }} </td>
                        </tr>
                        <tr>
                            <th>Upload Time</th>
                            <td>{{ $item->upload_time->translatedFormat('d-m-Y') }} </td>
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
