<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('coordinate_x',10,4);
            $table->float('coordinate_y', 10, 4);
            $table->string('name', 100);
            $table->string('state',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_stations');
    }
}
