@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Tambah Produk</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" name="jenis" id="jenis">
                        </div>
                        <div class="form-group">
                            <label for="farm">Farm</label>
                            <input type="text" class="form-control" name="farm" id="farm">
                        </div>
                        <div class="form-group">
                            <label for="DOB">Dob</label>
                            <input type="text" class="form-control" name="DOB" id="DOB">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="panjang">Panjang</label>
                            <input type="number" class="form-control" name="panjang" id="panjang">
                        </div>
                        <div class="form-group">
                            <label for="OB">Ob</label>
                            <input type="text" class="form-control" name="OB" id="OB">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
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
