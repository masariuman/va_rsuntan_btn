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
            $table->string('ref',12);
            $table->string('va',40);
            $table->string('nama',40);
            $table->string('layanan',40);
            $table->string('kodelayanan',10);
            $table->string('jenisbayar',40);
            $table->string('kodejenisbyr',12);
            $table->string('noid',20);
            $table->string('tagihan',19);
            $table->enum('flag',['F','P']);
            $table->dateTime('expired');
            $table->string('reserve',10);
            $table->string('description',60);
            $table->enum('status_inquiry',[1,0])->default(1);
            $table->enum('status',['pending','sukses','batal']);
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
        Schema::table('va', function (Blueprint $table) {
            $table->dropForeign('va_user_id_foreign');
        });
        Schema::dropIfExists('va');
    }
}
