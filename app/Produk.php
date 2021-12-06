<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'm_produk';
    protected $guarded = ['id'];

    public function foto()
    {
        return asset('storage/' . $this->foto);
    }
}
