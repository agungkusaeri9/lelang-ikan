<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $items = Member::orderBy('nama_member','ASC')->get();
        return view('pages.member.index',[
            'title' => 'Data Member',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.member.create',[
            'title' => 'Tambah Member'
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required']
        ]);

        $member = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt('password')
        ]);

        $member->assignRole('member');
        $member->member()->create([
            'nama_member' => request('name'),
            'kode_member' => request('kode_member'),
            'alamat' => request('alamat')
        ]);

        return redirect()->route('member.index')->with('success','Member berhasil disimpan');
    }

    public function show($id)
    {
        $item = Member::findOrFail($id);
        return view('pages.member.show',[
            'title' => 'Detail Member',
            'item' => $item
        ]);
    }

    public function edit($id)
    {
        $item = Member::findOrFail($id);
        return view('pages.member.edit',[
            'title' => 'Edit Member',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        $member = Member::findOrFail($id);
        $member->update([
            'nama_member' => request('nama_member'),
            'kode_member' => request('kode_member'),
            'alamat' => request('alamat')
        ]);

        $member->user()->update([
            'name' => request('nama_member')
        ]);

        return redirect()->route('member.index')->with('success','Member berhasil disimpan');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')->with('success','Member berhasil dihapus');
    }
}
