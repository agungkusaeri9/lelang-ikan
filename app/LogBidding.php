<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogBidding extends Model
{
    protected $table = 't_log_bidding';
    protected $guarded = ['id'];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class,'id_lelang','id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class,'nama_produk','nama');
    }

    public function pemenang($id_lelang,$nama_produk)
    {
        return $this->where('id_lelang',$id_lelang)->where('nama_produk',$nama_produk)->orderBy('harga','DESC')->first();
    }
}
