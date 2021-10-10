<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_id');
            $table->integer('group_id')->nullable();
            $table->string('title');
            $table->timestamp('date');
            $table->string('address');
            $table->integer('status')->default(1); //1 = Activo, 2 = Inactivo, 3 = En pausa, 4 = Cancelado
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
        Schema::dropIfExists('trips');
    }
}