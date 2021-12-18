<?php

namespace App\Http\Controllers;

use App\Lelang;
use App\LogBidding;
use App\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProdukLelangController extends Controller
{
    public function index()
    {
        $dt_lelang = Lelang::latest()->first();
        if(!$dt_lelang){
            $produk = [];
            $id_lelang = NULL;
        }else{
            $id_lelang = $dt_lelang->id;
            $dt_mulai_lelang = $dt_lelang->mulai_lelang->translatedFormat('Y-m-d');
            $dt_selesai_lelang = $dt_lelang->selesai_lelang->translatedFormat('Y-m-d H:i:s');
            if($dt_selesai_lelang < Carbon::now()->format('Y-m-d H:i:s') )
            {
                $produk = [];
            }else{
                $produk = Produk::whereDate('created_at',$dt_mulai_lelang)->get();
            }
        }
        return view('pages.produk-lelang.index',[
            'title' => 'Produk Lelang',
            'items' => $produk,
            'id_lelang' => $id_lelang
        ]);
    }

    public function show($id,$id_lelang)
    {
        $id = decrypt($id);
        $id_lelang = decrypt($id_lelang);
        $item = Produk::findOrFail($id);
        $bid = LogBidding::where('id_lelang',$id_lelang)->where('nama_produk',$item->nama)->orderBy('harga','DESC')->first();
        return view('pages.produk-lelang.show',[
            'title' => $item->nama,
            'item' => $item,
            'bid' => $bid
        ]);
    }

    public function bid($id_produk,$id_lelang)
    {

        $id_produk = decrypt($id_produk);
        $id_lelang = decrypt($id_lelang);
        $produk = Produk::findOrFail($id_produk);
        $bid_sebelumnya = LogBidding::where('id_lelang',$id_lelang)->where('nama_produk',$produk->nama)->orderBy('harga','DESC')->first()->harga;
        LogBidding::create([
            'id_telegram_user' => auth()->user()->member->id_telegram_user,
            'id_lelang' => $id_lelang,
            'nama_produk' => $produk->nama,
            'harga' => $bid_sebelumnya * 2
        ]);

        return redirect()->back()->with('success','Anda berhasil nge bid produk ini');

    }
}
