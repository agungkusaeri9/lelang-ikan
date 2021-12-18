<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $items = Group::latest()->get();
        return view('pages.group.index',[
            'title' => 'Data Group',
            'items' => $items
        ]);
    }
    public function create()
    {
        $users = User::role('member')->get();
        $admin = User::role('admin')->get();
        return view('pages.group.create',[
            'title' => 'Tambah Group',
            'users' => $users,
            'admins' => $admin
        ]);
    }

    public function store()
    {
        request()->validate([
            'user_id' => ['required'],
            'admin_id' => ['required'],
            'auction_id' => ['required'],
            'admin_group_username' => ['required'],
            'auction_group_username' => ['required'],
            'auction_token' => ['required'],
        ]);

        $data = request()->all();
        Group::create($data);
        return redirect()->route('group.index')->with('success','Group berhasil disimpan');
    }

    public function edit($id)
    {
        $item = Group::findOrfail($id);
        $users = User::role('member')->get();
        $admin = User::role('admin')->get();
        return view('pages.group.edit',[
            'title' => 'Edit Group',
            'item' => $item,
            'users' => $users,
            'admins' => $admin
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'user_id' => ['required'],
            'admin_id' => ['required'],
            'auction_id' => ['required'],
            'admin_group_username' => ['required'],
            'auction_group_username' => ['required'],
            'auction_token' => ['required'],
        ]);

        $item = Group::findOrFail($id);
        $data = request()->all();
        $item->update($data);
        return redirect()->route('group.index')->with('success','Group berhasil disimpan');
    }

    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return redirect()->route('group.index')->with('success','Group berhasil dihapus');
    }
}
