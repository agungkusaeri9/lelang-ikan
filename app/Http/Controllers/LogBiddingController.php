<?php

namespace App\Http\Controllers;

use App\LogBidding;
use Illuminate\Http\Request;

class LogBiddingController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('member')){
            $items = LogBidding::with('lelang')->where('id_telegram_user',auth()->user()->member->id_telegram_user)->latest()->get();
        }else{
            $items = LogBidding::latest()->get();
        }
        return view('pages.log-bidding.index',[
            'titla' => 'Data Log Bidding',
            'items' => $items
        ]);
    }
}
