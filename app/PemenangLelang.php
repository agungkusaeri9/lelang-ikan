<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemenangLelang extends Model
{
    protected $table = 't_pemenang_lelang';
    protected $guarded = ['id'];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class,'id_lelang','id');
    }
}
