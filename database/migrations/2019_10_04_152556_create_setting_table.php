<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('expired');
            $table->string('prefix_va');
            $table->string('kode_instituse');
            $table->string('kode_payment');
            $table->timestamps();
        });
        DB::table('setting')->insert([
            ['nama'=>'Rumah Sakit Universitas Tanjungpura','expired'=>24,'prefix_va'=>'9','kode_instituse'=>'4578','kode_payment'=>'000']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
