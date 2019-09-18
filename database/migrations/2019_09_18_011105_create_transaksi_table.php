<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('va_id');
            $table->foreign('va_id')->references('id')->on('va');
            $table->string('ref',12);
            $table->string('va',40);
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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_user_id_foreign');
        });
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_va_id_foreign');
        });
        Schema::dropIfExists('transaksi');
    }
}
