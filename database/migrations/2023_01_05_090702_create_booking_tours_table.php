<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tour_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('number_of_people')->nullable();
            $table->string('expected_travel_time')->nullable();
            $table->tinyInteger('status')->comment('0: waiting confirm, 1: confirmed; 2: traveling; 3: finished');
            $table->string('reality_cost')->nullable()->comment('only set when status = 3');
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
        Schema::dropIfExists('booking_tours');
    }
}
