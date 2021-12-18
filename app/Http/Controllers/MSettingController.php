<?php

namespace App\Http\Controllers;

use App\MSetting;
use Illuminate\Http\Request;

class MSettingController extends Controller
{
    public function index()
    {
        $items = MSetting::latest()->get();
        return view('pages.setting.index',[
            'title' => 'Settigg',
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.setting.create',[
            'title' => 'Tambah Setting',
        ]);
    }

    public function store()
    {
        request()->validate([
            'name_setting' => ['required'],
            'status' => ['required','in:0,1']
        ]);

        $data = request()->all();
        MSetting::create($data);
        return redirect()->route('m-setting.index')->with('success','Setting berhasil disimpan');
    }

    public function edit($id)
    {
        $item = MSetting::where('id_setting',$id)->firstOrfail();
        return view('pages.setting.edit',[
            'title' => 'Edit Setting',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name_setting' => ['required'],
            'status' => ['required','in:0,1']
        ]);

        $data = request()->all();
        MSetting::where('id_setting',$id)->update([
            'name_setting' => request('name_setting'),
            'status' => request('status'),
            'value' => request('value')
        ]);
        return redirect()->route('m-setting.index')->with('success','Setting berhasil disimpan');
    }

    public function destroy($id)
    {
        MSetting::where('id_setting',$id)->delete();
        return redirect()->route('m-setting.index')->with('success','Setting berhasil dihapus');
    }
}
