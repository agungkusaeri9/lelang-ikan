<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid', function (Blueprint $table) {
            $table->increments('bid_id');
            $table->string('message_id_admin');
            $table->string('message_id_auction');
            $table->string('user_id')->nullable();
            $table->string('admin_id');
            $table->string('upload_time');
            $table->string('ob');
            $table->string('kb');
            $table->string('caption')->nullable();
            $table->string('start_time');
            $table->string('end_time');
            $table->string('extra_time');
            $table->string('final_bid');
            $table->string('path');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid');
    }
}
