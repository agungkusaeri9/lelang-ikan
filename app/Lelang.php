<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'm_lelang';
    protected $guarded = ['id'];
    public $dates = ['mulai_lelang','selesai_lelang'];

    public function bid()
    {
        return $this->hasMany(LogBidding::class,'id_lelang','id');
    }

    public function produk()
    {
        return $this->hasMany(LogBidding::class,'nama_produk','nama');
    }

}
