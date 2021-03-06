@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Edit Lelang</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('lelang.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="mulai_lelang">Mulai Lelang</label>
                            <input type="datetime-local" class="form-control" name="mulai_lelang" id="mulai_lelang" value="{{ $item->mulai_lelang->translatedFormat('Y-m-d\TH:i') }}">
                        </div>
                        <div class="form-group">
                            <label for="selesai_lelang">Selesai Lelang</label>
                            <input type="datetime-local" class="form-control" name="selesai_lelang" id="selesai_lelang" value="{{ $item->selesai_lelang->translatedFormat('Y-m-d\TH:i') }}">
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
