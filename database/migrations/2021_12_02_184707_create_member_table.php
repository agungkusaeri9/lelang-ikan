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
        Schema::create('m_member', function (Blueprint $table) {
            $table->id();
            $table->string('nama',25)->unique();
            $table->string('id_telegram_user',100);
            $table->string('email',50)->unique();
            $table->string('no_hp',15)->unique();
            $table->string('kode_prop',10)->nullable();
            $table->string('kode_kota',10)->nullable();
            $table->text('alamat')->nullable();
            $table->integer('status')->default(0);
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
