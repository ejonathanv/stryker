<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'jobtitle' => $this->faker->jobTitle,
            'phone' => $this->faker->tollFreePhoneNumber(),
            'fmm' => rand(0,1),
        ];
    }
}
