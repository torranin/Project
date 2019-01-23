<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dataDeviceId');
            $table->string('detail');
            $table->date('sendDate');
            $table->date('receiveDate')->nullable();
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
        Schema::dropIfExists('send_devices');
    }
}
