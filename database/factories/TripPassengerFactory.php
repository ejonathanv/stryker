<?php

namespace Database\Factories;

use App\Models\Passenger;
use App\Models\Trip;
use App\Models\TripDriver;
use App\Models\TripPassenger;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripPassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TripPassenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'passenger_id' => Passenger::factory(),
            'trip_id' => Trip::factory(),
            'trip_driver_id' => TripDriver::factory()
        ];
    }
}
