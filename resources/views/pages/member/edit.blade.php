@extends('layouts.app')
@section('content')
<div class="container">
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
                            <label for="nama_member">Nama</label>
                            <input type="text" class="form-control" name="nama_member" id="nama_member" value="{{ $item->nama_member }}">
                        </div>
                        <div class="form-group">
                            <label for="kode_member">Kode</label>
                            <input type="text" class="form-control" name="kode_member" id="kode_member" value="{{ $item->kode_member }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" id="alamat" cols="30" rows="5">{{ $item->alamat }}</textarea>
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
