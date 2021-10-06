<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word(),
            'model' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'year' => rand(2012,2022),
            'capacity' => rand(5,12),
            'plates' => hexdec(uniqid()),
            'plates_region' => $this->faker->randomElement(['MX', 'USA']),
            'picture' => 'http://placehold.it/600x600',
        ];
    }
}
