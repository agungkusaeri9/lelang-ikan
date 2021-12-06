<?php

namespace App\Http\Controllers;

use App\Lelang;
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
        Lelang::create($data);

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

        $data = request()->all();
        $item = Lelang::findOrFail($id);
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
