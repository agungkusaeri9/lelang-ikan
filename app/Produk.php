<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    protected $table = 'm_produk';
    protected $guarded = ['id'];

    public function foto()
    {
        return asset('storage/' . $this->foto);
    }

    public function bid()
    {
        return $this->hasMany(LogBidding::class,'nama_produk','nama');
    }
}
