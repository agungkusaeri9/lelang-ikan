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
                            <th width="150">Nama</th>
                            <td>{{ $item->nama }}</td>
                        </tr>
                        <tr>
                            <th>ID Telegram</th>
                            <td>{{ $item->id_telegram_user }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item->user->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Hp</th>
                            <td>{{ $item->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Kode Prop</th>
                            <td>{{ $item->kode_prop }}</td>
                        </tr>
                        <tr>
                            <th>Kode Kota</th>
                            <td>{{ $item->kode_kota }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $item->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($item->status == 1)
                                Aktif
                                @else 
                                Tidak Aktif
                                @endif
                            </td>
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
