@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang {{ auth()->user()->name }}, selaku {{ auth()->user()->roles->pluck('name')->first() }}

                    @role('member')
                    <div class="row">
                        @foreach ($pemenang as $pem)
                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Selamat!</h4>
                                <p>Anda telah memenangkan BID dengan lelang {{ $pem->lelang->nama }} produk {{ $pem->nama_produk }} dengan harga <strong>Rp. {{ number_format($pem->harga) }}</strong>.</p>
                                <hr>
                                <p class="mb-0">Pada hari {{ $pem->created_at->translatedFormat('l, d F Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
