<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $items = Produk::latest()->get();
        return view('pages.produk.index',[
            'title' => 'Data Produk',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.produk.create',[
            'title' => 'Tambah Produk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => ['required'],
            'foto' => ['required','image','mimes:jpg,png,jpeg'],
            'jenis' => ['required'],
            'deskripsi' => ['required']
        ]);


        $data = request()->all();
        $data['foto'] = request()->file('foto')->store('produk','public');
        Produk::create($data);

        return redirect()->route('produk.index')->with('success','Produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Produk::findOrFail($id);
        return view('pages.produk.edit',[
            'title' => 'Edit Produk',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama' => ['required'],
            'jenis' => ['required'],
            'deskripsi' => ['required']
        ]);


        $data = request()->all();
        $item = Produk::findOrFail($id);
        if(request()->file('foto')){
            Storage::disk('public')->delete($item->foto);
            $data['foto'] = request()->file('foto')->store('produk','public');
        }else{
            $data['foto'] = $item->foto;
        }
        $item->update($data);

        return redirect()->route('produk.index')->with('success','Produk berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Produk::findOrFail($id);
        Storage::disk('public')->delete($item->foto);
        $item->delete();

        return redirect()->route('produk.index')->with('success','Produk berhasil dihapus');
    }
}
