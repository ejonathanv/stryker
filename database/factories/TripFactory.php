<?php
namespace Database\Factories;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $date = Carbon::now()->addDays(rand(0,10));

        return [
            'title' => $this->faker->realText(40),
            'date' => $date,
            'address' => $this->faker->streetAddress
        ];
    }
}