<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupId');
            $table->integer('deviceId');
            $table->string('nameTitle');
            $table->string('detailData');
            $table->string('codeId');
            $table->enum('status',["normal" ,"repair" , "selling"]);
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
        Schema::dropIfExists('data_devices');
    }
}
