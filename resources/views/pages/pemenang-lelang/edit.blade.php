@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Edit Pemenang Lelang</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemenang-lelang.update',$item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="id_lelang">Nama Lelang</label>
                            <select name="id_lelang" id="id_lelang" class="form-control">
                                <option value="" selected disabled>-- Pilih Lelang --</option>
                                @foreach ($lelangs as $lelang)
                                    <option @if($lelang->id == $item->id_lelang) selected @endif  value="{{ $lelang->id }}">{{ $lelang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_telegram_user">ID Telegram</label>
                            <input type="number" class="form-control" name="id_telegram_user" id="id_telegram_user" value="{{ $item->id_telegram_user }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $item->nama_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ $item->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                           <select name="status" id="status" class="form-control">
                               <option value="" selected disabled>-- Pilih Status --</option>
                               <option @if($item->status == 0) selected @endif value="0">Tidak Aktif</option>
                               <option @if($item->status == 1) selected @endif value="1">Aktif</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection