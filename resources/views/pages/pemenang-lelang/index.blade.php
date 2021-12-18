@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Berhasil !</strong>
            <p>{{ session('success') }}</p>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            <strong>Gagal !</strong>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Data Pemenang Lelang</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dtable">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Nama Lelang</th>
                                <th>Nama Produk</th>
                                <th>ID Telegram</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->lelang->nama }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->id_telegram_user }}</td>
                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemenang-lelang.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('pemenang-lelang.destroy', $item->id) }}" method="post" class="d-inline">
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

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Set Pemenang Lelang</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dtable">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Nama</th>
                                <th>Mulai Lelang</th>
                                <th>Selesai Lelang</th>
                                <th>BID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $lelang)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $lelang->nama }}</td>
                                <td>{{ $lelang->mulai_lelang->translatedFormat('d/m/Y H:i:s') }}</td>
                                <td>{{ $lelang->selesai_lelang->translatedFormat('d/m/Y H:i:s')}}</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>ID Telegram</th>
                                            <th>Harga Final</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @php
                                            $produk = $lelang->bid->groupBy('nama_produk');
                                            
                                        @endphp
                                        @foreach ($produk as $prod)
                                        {{-- {{ dd($prod[0]->id_lelang) }} --}}
                                            <tr>
                                                <td>{{ $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->nama_produk }}</td>
                                                <td>{{ $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->id_telegram_user ?? ' - ' }}</td>
                                                <td>Rp. {{ number_format($prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->harga) }}</td>
                                                <td>
                                                    @if ($prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->id_telegram_user)
                                                    <form action="{{ route('pemenang-lelang.store', $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id_lelang" value="{{ $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->id_lelang }}">
                                                        <input type="hidden" name="nama_produk" value="{{ $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->nama_produk }}">
                                                        <input type="hidden" name="id_telegram_user" value="{{ $prod[0]->pemenang($lelang->id,$prod[0]->nama_produk)->id_telegram_user }}">
                                                        <button class="btn btn-sm btn-info">Set Pemenang</button>
                                                    </form>
                                                    @else 
                                                    <span class="badge badge-warning text-white">Tidak ada yang ngebid</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
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
        $('.dtable').DataTable();
    } );
</script>
@endpush