@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Tambah Group</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('group.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">User</label>
                           <select name="user_id" id="user_id" class="form-control select2">
                               <option value="" selected disabled>-- Pilih User --</option>
                               @foreach ($users as $user)
                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="admin_id">Admin</label>
                           <select name="admin_id" id="admin_id" class="form-control select2">
                               <option value="" selected disabled>-- Pilih Admin --</option>
                               @foreach ($admins as $admin)
                               <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="admin_group_username">Username Admin Group</label>
                            <input type="text" class="form-control @error('admin_group_username') is-invalid @enderror"  name="admin_group_username" id="admin_group_username">
                            @error('admin_group_username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="auction_id">Auction ID</label>
                            <input type="text" class="form-control @error('auction_id') is-invalid @enderror"  name="auction_id" id="auction_id">
                            @error('auction_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="auction_group_username">Username Auction Group</label>
                            <input type="text" class="form-control @error('auction_group_username') is-invalid @enderror"  name="auction_group_username" id="auction_group_username">
                            @error('auction_group_username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="auction_token">Auction Token</label>
                            <input type="text" class="form-control @error('auction_token') is-invalid @enderror"  name="auction_token" id="auction_token">
                            @error('auction_token')
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
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function(){
    $('.select2').select2({
        theme: 'bootstrap'
    })
})
</script>
@endpush