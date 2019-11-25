<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTransaksiHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('va_id');
            $table->foreign('va_id')->references('id')->on('va');
            $table->string('ref',12);
            $table->string('nama',40);
            $table->string('layanan',40);
            $table->string('kodelayanan',10);
            $table->string('jenisbayar',40);
            $table->string('kodejenisbyr',12);
            $table->string('noid',20);
            $table->string('tagihan');
            $table->enum('flag',['F','P']);
            $table->dateTime('expired');
            $table->string('reserve',10);
            $table->string('description',60);
            $table->string('terbayar');
            $table->enum('status_transaksi',['pending','success','cancel','off']);
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
        Schema::table('transaksi_history', function (Blueprint $table) {
            $table->dropForeign('transaksi_history_user_id_foreign');
        });
        Schema::table('transaksi_history', function (Blueprint $table) {
            $table->dropForeign('transaksi_history_va_id_foreign');
        });
        Schema::table('transaksi_history', function (Blueprint $table) {
            $table->dropForeign('transaksi_history_transaksi_id_foreign');
        });
        Schema::dropIfExists('transaksi_history');
    }
}
