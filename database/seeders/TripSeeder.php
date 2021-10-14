<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\TripDriver;
use App\Models\TripPassenger;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::factory()->count(5)->create()->each(function($trip){


            TripPassenger::factory()->count(3)->create([
                'trip_id' => $trip->id
            ]);


            TripDriver::factory()->create([
                'trip_id' => $trip->id
            ]);

        });
    }
}
