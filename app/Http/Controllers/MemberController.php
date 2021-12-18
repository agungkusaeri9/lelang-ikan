<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index()
    {
        $items = Member::latest()->get();
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
            'nama_lengkap' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'tanggal_lahir' => ['required']
        ]);

        $member = User::create([
            'name' => request('nama_lengkap'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $member->assignRole('member');
        $data = request()->all();
        $data['upload_time'] = Carbon::now();
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
        $member = Member::findOrFail($id);
        request()->validate([
            'nama_lengkap' => ['required'],
            'email' => ['required','email',Rule::unique('users','email')->ignore($member->user_id)],
            'tanggal_lahir' => ['required']
        ]);
        $data = request()->all();
        $member->update($data);

        $member->user()->update([
            'name' => request('nama_lengkap'),
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
