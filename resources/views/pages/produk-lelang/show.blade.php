@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <strong>Berhasil !</strong>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @elseif (session('error'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <strong>Gagal !</strong>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $item->nama }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img src="{{ $item->foto() }}" alt="" class="img-fuid w-100">
            <h5 class="mt-3">Detail</h5>
            <div class="detail">
                <table>
                    <tr>
                        <td>Jenis</td>
                        <td> : {{ $item->jenis }}</td>
                    </tr>
                    <tr>
                        <td>farm</td>
                        <td> : {{ $item->farm }}</td>
                    </tr>
                    <tr>
                        <td>DOB</td>
                        <td> : {{ $item->DOB }}</td>
                    </tr>
                    <tr>
                        <td>Certi</td>
                        <td> : {{ $item->certi }}</td>
                    </tr>
                    <tr>
                        <td>Panjang</td>
                        <td> : {{ $item->panjang }}</td>
                    </tr>
                    <tr>
                        <td>OB</td>
                        <td> : {{ $item->OB }}</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td> : 
                            @if ($item->status == 0)
                            Tidak Aktif
                            @else
                            AKtif
                            @endif
                        </td>
                    </tr>
                </table>
                <h5 class="mt-3">Deskripsi</h5>
                <p>{{ $item->deskripsi }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0">  
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">
                        BID
                    </h5>
                    @if (auth()->user()->member->id_telegram_user == $bid->id_telegram_user)
                    <div class="alert alert-success">
                     <p>BID anda tertinggi</p>
                    </div>
                     @endif
                    <div class="d-flex justify-content-between">
                        <p>Harga Terakhir</p>
                        <p>Rp. {{ number_format($bid->harga) }}</p>
                    </div>
                    <form action="{{ route('produk-lelang.bid',[encrypt($item->id), encrypt($bid->id_lelang)]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $bid->harga*2 }}" readonly>
                        </div>
                        <button class="btn btn-primary">Bid Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection