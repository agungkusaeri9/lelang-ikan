<?php

namespace App\Http\Controllers;

use App\Lelang;
use App\LogBidding;
use App\Produk;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index()
    {
        $items = Lelang::latest()->get();
        return view('pages.lelang.index',[
            'title' => 'Data Lelang',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.lelang.create',[
            'title' => 'Tambah Lelang'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'mulai_lelang' => ['required'],
            'selesai_lelang' => ['required']
        ]);

        $data = request()->all();
        $data['created_by'] = auth()->user()->name;
        $lelang = Lelang::create($data);
        $produk = Produk::whereDate('created_at',$lelang->mulai_lelang->translatedFormat('Y-m-d'))->get();
        if(request('harga_lelang')){
            $harga = request('harga_lelang');
        }else{
            $harga = 0;
        }
        foreach($produk as $pd){
            LogBidding::create([
                'id_lelang' => $lelang->id,
                'nama_produk' => $pd->nama,
                'harga' => $harga
            ]);
        }

        return redirect()->route('lelang.index')->with('success','Lelang berhasil disimpan');
    }

    public function edit($id)
    {
        $item = Lelang::findOrFail($id);
        return view('pages.lelang.edit',[
            'title' => 'Edit Lelang',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'mulai_lelang' => ['required'],
            'selesai_lelang' => ['required']
        ]);

        $item = Lelang::findOrFail($id);
        $data = request()->all();
        $data['updated_by'] = auth()->user()->name;
        $item->update($data);

        return redirect()->route('lelang.index')->with('success','Lelang berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = Lelang::findOrFail($id);
        $item->delete();

        return redirect()->route('lelang.index')->with('success','Lelang berhasil dihapus');
    }
}
