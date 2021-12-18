@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Edit Member</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('member.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $item->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_telegram_user">ID Telegram</label>
                            <input type="text" class="form-control @error('id_telegram_user') is-invalid @enderror"  name="id_telegram_user" id="id_telegram_user" value="{{ $item->id_telegram_user }}">
                            @error('id_telegram_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ $item->no_hp }}">
                        </div>
                        <div class="form-group">
                            <label for="kode_prop">Kode Prop</label>
                            <input type="text" class="form-control" name="kode_prop" id="kode_prop" value="{{ $item->kode_prop }}">
                        </div>
                        <div class="form-group">
                            <label for="kode_kota">Kode Kota</label>
                            <input type="text" class="form-control" name="kode_kota" id="kode_kota" value="{{ $item->kode_kota }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" id="alamat" cols="30" rows="5">{{ $item->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" id="email" value="{{ $item->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status --</option>
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
