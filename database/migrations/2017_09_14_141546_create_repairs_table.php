<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupId');
            $table->integer('deviceId')->nullable();
            $table->text('problemsDetail');
            $table->text('cause');
            $table->text('editing');
            $table->date('date');
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
        Schema::dropIfExists('repairs');
    }
}
