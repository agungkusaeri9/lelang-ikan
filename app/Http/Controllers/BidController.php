<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Bidder;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $items = Bid::with('bidder')->latest()->get();
        return view('pages.bid.index',[
            'items' => $items,
            'title' => 'Data Bid'
        ]);
    }

    public function bidder($id)
    {
        $bidders = Bidder::where('bid_id',$id)->latest()->get();
        return view('pages.bid.bidder',[
            'bidders' => $bidders
        ]);
    }

    public function destroy($id)
    {
        Bid::where('bid_id',$id)->delete();
        return redirect()->route('bid.index')->with('success','Bid berhasil dihapus');
    }
}
