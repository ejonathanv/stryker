<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\TripDriver;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripDriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TripDriver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $from_time = \Carbon\Carbon::now()->addHours(rand(0, 7));
        $to_time = \Carbon\Carbon::parse($from_time)->addHours(rand(1,3));

        return [

            'trip_id'    => Trip::factory(),
            'driver_id'  => Driver::factory(),
            'vehicle_id' => Vehicle::factory(),
            'from'       => $this->faker->streetAddress,
            'from_time' => $from_time,
            'to'         => $this->faker->streetAddress,
            'to_time' => $to_time
        ];
    }
}
