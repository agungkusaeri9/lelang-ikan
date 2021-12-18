<?php

namespace App\Http\Controllers;

use App\Lelang;
use App\LogBidding;
use App\PemenangLelang;
use App\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemenangLelangController extends Controller
{
    public function index()
    {
        $items = PemenangLelang::with('lelang')->latest()->get();
        $lelangs = Lelang::with('bid.produk')->whereDate('selesai_lelang', '<', Carbon::now()->translatedFormat('Y-m-d'))->latest()->get();
        return view('pages.pemenang-lelang.index',[
            'title' => 'Pemenang Lelang',
            'items' => $items,
            'lelangs' => $lelangs
        ]);
    }

    public function create()
    {
        $lelang = Lelang::latest()->get();
        return view('pages.pemenang-lelang.create',[
            'title' => 'Tambah Pemenang Lelang',
            'lelangs' => $lelang
        ]);
    }

    public function store($id)
    {
        $item = LogBidding::findOrFail($id);
        $pemenang = PemenangLelang::where('id_lelang',request('id_lelang'))->where('nama_produk',request('nama_produk'))->where('id_telegram_user',request('id_telegram_user'))->first();
        if($pemenang)
        {
            return redirect()->back()->with('error','Pemenang Lelang '. $item->lelang->nama .' dengan produk ' . $item->nama_produk . ' sudah ada');
        }
        PemenangLelang::create([
            'id_telegram_user' => $item->id_telegram_user,
            'nama_produk' => $item->nama_produk,
            'id_lelang' => $item->id_lelang,
            'status' => 1,
            'harga' => $item->harga
        ]);
        return redirect()->route('pemenang-lelang.index')->with('success','Pemenang Lelang berhasil disimpan');
    }

    public function edit($id)
    {
        $item = PemenangLelang::findOrFail($id);
        $lelang = Lelang::latest()->get();
        return view('pages.pemenang-lelang.edit',[
            'title' => 'Tambah Pemenang Lelang',
            'lelangs' => $lelang,
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'id_lelang' => ['required'],
            'nama_produk' => ['required'],
            'harga' => ['required'],
            'id_telegram_user' => ['required'],
            'status' => ['required','in:0,1']
        ]);

        $data = request()->all();
        $item = PemenangLelang::findOrFail($id);
        $item->update($data);
        return redirect()->route('pemenang-lelang.index')->with('success','Pemenang Lelang berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = PemenangLelang::findOrFail($id);
        $item->delete();
        return redirect()->route('pemenang-lelang.index')->with('success','Pemenang Lelang berhasil disimpan');
    }
}
