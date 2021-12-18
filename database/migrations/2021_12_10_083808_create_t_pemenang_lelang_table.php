<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPemenangLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pemenang_lelang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lelang')->nullable();
            $table->bigInteger('id_telegram_user')->nullable();
            $table->string('nama_produk');
            $table->bigInteger('harga');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('t_pemenang_lelang');
    }
}
