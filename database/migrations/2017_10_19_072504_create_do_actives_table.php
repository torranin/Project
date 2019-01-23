<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('do_actives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupId');
            $table->integer('deviceId')->nullable();
            $table->text('problemsDetail');
            $table->text('cause')->nullable();
            $table->text('editing')->nullable();
            $table->enum('urgency', array('normal', 'express', 'urgent'))->nullable();
            $table->enum('status', array('no', 'success'))->nullable();
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
        Schema::dropIfExists('do_actives');
    }
}
