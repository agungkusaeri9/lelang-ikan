<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index()
    {
        $items = Member::orderBy('nama','ASC')->get();
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
            'nama' => ['required'],
            'email' => ['required','email','unique:m_member,email'],
            'password' => ['required'],
            'id_telegram_user' => ['required']
        ]);

        $member = User::create([
            'name' => request('nama'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $member->assignRole('member');
        $data = request()->all();
        $member->member()->create($data);

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
        request()->validate([
            'nama' => ['required'],
            'email' => ['required','email',Rule::unique('m_member','email')->ignore($id)],
            'id_telegram_user' => ['required']
        ]);
        $member = Member::findOrFail($id);
        $data = request()->all();
        $member->update($data);

        $member->user()->update([
            'name' => request('nama'),
            'email' => request('email')
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
