<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $table = 'member';
    protected $guarded = ['id'];
    public $dates = ['upload_time','tanggal_lahir'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
