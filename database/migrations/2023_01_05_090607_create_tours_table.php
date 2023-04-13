<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('language')->comment('1: en', '2: es');
            $table->integer('country_id');
            $table->string('name');
            $table->tinyInteger('num_of_day');
            $table->float('cost')->nullable();
            $table->text('image_link');
            $table->string('tag')->nullable();
            $table->text('description');
            $table->text('content');
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
        Schema::dropIfExists('tours');
    }
}
