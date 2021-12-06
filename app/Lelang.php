<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'm_lelang';
    protected $guarded = ['id'];
    public $dates = ['mulai_lelang','selesai_lelang'];
}
