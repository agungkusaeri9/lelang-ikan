<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama',30);
            $table->string('foto');
            $table->string('jenis',30);
            $table->text('deskripsi');
            $table->string('farm',100)->nullable();
            $table->integer('DOB')->nullable();
            $table->string('certi')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('OB')->nullable();
            $table->integer('status')->default(0);
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('m_produk');
    }
}
