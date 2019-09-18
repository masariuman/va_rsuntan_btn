<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('va', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('ref',12);
            $table->string('va',40);
            $table->string('nama',40);
            $table->string('layanan',40);
            $table->integer('kodelayanan',10);
            $table->string('jenisbayar',40);
            $table->bigInteger('kodejenisbyr',12);
            $table->string('noid',20);
            $table->bigInteger('tagihan',19);
            $table->enum('flag',['F','P']);
            $table->dateTime('expired');
            $table->string('reserve',10);
            $table->string('description',60);
            $table->enum('status_inquiry',[0,1])
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
        Schema::dropIfExists('va');
    }
}
