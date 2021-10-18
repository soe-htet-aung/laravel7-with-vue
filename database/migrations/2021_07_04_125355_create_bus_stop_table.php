<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_stop', function (Blueprint $table) {
            $table->increments('stop_id');
            $table->string('stop_name')->nullable();
            $table->integer('bus_id');
            $table->foreign('bus_id')->references('bus_id')->on('bus')->onDelete('cascade');
            $table->string('stop_latitude')->nullable();
            $table->string('stop_longitude')->nullable();
            $table->string('next_stop_latitude')->nullable();
            $table->string('next_stop_longitude')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_stop');
    }
}
