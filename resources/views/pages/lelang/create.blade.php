@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Tambah Lelang</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('lelang.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="mulai_lelang">Mulai Lelang</label>
                            <input type="date" class="form-control" name="mulai_lelang" id="mulai_lelang">
                        </div>
                        <div class="form-group">
                            <label for="selesai_lelang">Selesai Lelang</label>
                            <input type="date" class="form-control" name="selesai_lelang" id="selesai_lelang">
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
