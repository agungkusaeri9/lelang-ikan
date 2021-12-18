<?php

namespace App\Http\Controllers;

use App\Member;
use App\Produk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashController extends Controller
{
    public function member()
    {
        $items = Member::onlyTrashed()->get();
        return view('pages.trash.member',[
            'title' => 'Keranjang Sampah Member',
            'items' => $items
        ]);
    }

    public function memberRestore($id)
    {
        $member = Member::withTrashed()->findOrFail($id);
            
        $member->restore();
        return redirect()->route('trash.member')->with('success','Data Member berhasil dipulihkan');
    }
    public function memberDestroyPermanent($id)
    {
        $member = Member::withTrashed()->findOrFail($id);
            
        $member->user()->forceDelete();
        return redirect()->route('trash.member')->with('success','Data Member berhasil dihapus secara permanen');
    }

    public function user()
    {
        $items = User::onlyTrashed()->get();
        return view('pages.trash.user',[
            'title' => 'Keranjang Sampah User',
            'items' => $items
        ]);
    }

    public function userRestore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
            
        $user->restore();
        return redirect()->route('trash.user')->with('success','Data User berhasil dipulihkan');
    }
    public function userDestroyPermanent($id)
    {
        $user = User::withTrashed()->findOrFail($id);
            
        $user->member()->forceDelete();
        return redirect()->route('trash.user')->with('success','Data User berhasil dihapus secara permanen');
    }

    public function produk()
    {
        $items = Produk::onlyTrashed()->get();
        return view('pages.trash.produk',[
            'title' => 'Keranjang Sampah Produk',
            'items' => $items
        ]);
    }

    public function produkRestore($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);
            
        $produk->restore();
        return redirect()->route('trash.produk')->with('success','Data produk berhasil dipulihkan');
    }
    public function produkDestroyPermanent($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);
        
        $produk->forceDelete();
        Storage::disk('public')->delete($produk->foto);
        return redirect()->route('trash.produk')->with('success','Data produk berhasil dihapus secara permanen');
    }
}
