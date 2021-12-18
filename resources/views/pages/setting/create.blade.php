@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Tambah Setting</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('m-setting.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name_setting">Name Setting</label>
                            <input type="text" class="form-control" name="name_setting" id="name_setting">
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" name="value" id="value">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                           <select name="status" id="status" class="form-control">
                               <option value="" selected disabled>-- Pilih Status --</option>
                               <option value="0">Tidak Aktif</option>
                               <option value="1">Aktif</option>
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