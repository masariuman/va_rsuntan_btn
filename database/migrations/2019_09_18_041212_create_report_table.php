<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('va_id');
            $table->foreign('va_id')->references('id')->on('va');
            $table->string('rsp',3);
            $table->string('rspdesc',50);
            $table->string('nama',40);
            $table->string('teller',7);
            $table->string('transcode',4);
            $table->string('seq',7);
            $table->date('tgl');
            $table->time('jam');
            $table->string('amount',19);
            $table->string('revflag',1);
            $table->string('revseq',7);
            $table->string('revjam',6);
            $table->string('tagihan',19);
            $table->string('terbayar',19);
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
        Schema::table('report', function (Blueprint $table) {
            $table->dropForeign('report_va_id_foreign');
        });
        Schema::dropIfExists('report');
    }
}
