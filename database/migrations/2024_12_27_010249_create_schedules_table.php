<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('route_id');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->integer('available_seats');
            $table->timestamps();

            $table->foreign('bus_id')->references('bus_id')->on('buses')->onDelete('cascade');
            $table->foreign('route_id')->references('route_id')->on('routes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
