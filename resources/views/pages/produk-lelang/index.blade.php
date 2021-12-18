@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Produk Lelang</h3>
        </div>
    </div>
    <div class="row">
        @forelse ($items as $item)
        <div class="col-md-3">
            <a href="{{ route('produk-lelang.show', [encrypt($item->id), encrypt($id_lelang)]) }}" class="text-dark px-0 nav-link">
                <div class="card" style="min-height: 340px">
                    <img src="{{ $item->foto() }}" class="card-img-top" alt="..." style="height: 150px">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->nama }}</h5>
                      <p class="card-text">{{ $item->deskripsi }}</p>
                      <a href="{{ route('produk-lelang.show', [encrypt($item->id), encrypt($id_lelang)]) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </a>
        </div>
        @empty 
        <div class="col-12">
            <div class="alert alert-secondary">
                <p>Tidak Ada Lelang</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection