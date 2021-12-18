<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap',50)->unique();
            $table->date('tanggal_lahir');
            $table->string('provinsi_tempat_tinggal',50)->unique();
            $table->string('kota_tempat_tinggal',15)->unique();
            $table->text('alamat_tinggal')->nullable();
            $table->string('no_telp')->nullable();
            $table->timestamp('upload_time')->nullable();
            $table->bigInteger('number_transaction')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('member');
    }
}
