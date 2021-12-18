@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Tambah Member</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('member.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"  name="tanggal_lahir" id="tanggal_lahir">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="provinsi_tempat_tinggal">Provinsi Tempat Tinggal</label>
                            <input type="text" class="form-control @error('provinsi_tempat_tinggal') is-invalid @enderror"  name="provinsi_tempat_tinggal" id="provinsi_tempat_tinggal">
                            @error('provinsi_tempat_tinggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kota_tempat_tinggal">Kota Tempat Tinggal</label>
                            <input type="text" class="form-control @error('kota_tempat_tinggal') is-invalid @enderror"  name="kota_tempat_tinggal" id="kota_tempat_tinggal">
                            @error('kota_tempat_tinggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat_tinggal">Alamat Tinggal</label>
                            <textarea type="text" class="form-control" name="alamat_tinggal" id="alamat_tinggal" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror"  name="no_telp" id="no_telp">
                            @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" id="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="number_transaction">No. Transaksi</label>
                            <input type="number" class="form-control @error('number_transaction') is-invalid @enderror"  name="number_transaction" id="number_transaction">
                            @error('number_transaction')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
