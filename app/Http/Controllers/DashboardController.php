<?php

namespace App\Http\Controllers;

use App\PemenangLelang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('member')){
            $pemenang = PemenangLelang::where('id_telegram_user',auth()->user()->member->id_telegram_user)->get();
        }else{
            $pemenang = [];
        }
        return view('pages.dashboard',[
            'title' => 'Dashboard',
            'pemenang' => $pemenang
        ]);
    }
}
