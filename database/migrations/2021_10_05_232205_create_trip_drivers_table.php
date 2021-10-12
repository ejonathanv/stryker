<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id');
            $table->integer('driver_id');
            $table->integer('vehicle_id');
            $table->string('from')->nullable();
            $table->timestamp('from_time')->nullable();
            $table->string('to')->nullable();
            $table->timestamp('to_time')->nullable();
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
        Schema::dropIfExists('trip_drivers');
    }
}
