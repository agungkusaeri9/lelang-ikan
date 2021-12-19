<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bidder extends Model
{
    protected $table = 'bidder';
    protected $guarded = ['id'];

    public function bid()
    {
        return $this->BelongsTo(Bid::class,'bid_id','bid_id');
    }
}
