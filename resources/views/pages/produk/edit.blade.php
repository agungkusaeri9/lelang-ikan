@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Edit Produk</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="{{ $item->jenis }}">
                        </div>
                        <div class="form-group">
                            <label for="farm">Farm</label>
                            <input type="text" class="form-control" name="farm" id="farm" value="{{ $item->farm }}">
                        </div>
                        <div class="form-group">
                            <label for="DOB">DOB</label>
                            <input type="text" class="form-control" name="DOB" id="DOB" value="{{ $item->DOB }}">
                        </div>
                        <div class="form-group">
                            <label for="certi">Sertifikat</label>
                            <input type="text" class="form-control" name="certi" id="certi" value="{{ $item->certi }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5">{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="panjang">Panjang</label>
                            <input type="number" class="form-control" name="panjang" id="panjang" value="{{ $item->panjang }}">
                        </div>
                        <div class="form-group">
                            <label for="OB">OB</label>
                            <input type="text" class="form-control" name="OB" id="OB" value="{{ $item->OB }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="foto">Foto</label>
                                <img src="{{ $item->foto() }}" alt="" class="img-fluid">
                            </div>
                            <div class="col align-self-center">
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
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
