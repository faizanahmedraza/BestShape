<?php

namespace Database\Factories;

use Faker\Generator as Faker; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BuserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Buser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->unique()->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'address' => $this->faker->address,
            'days' => $this->faker->dayOfWeek,
            'energy_units' => $this->faker->buildingNumber,
            'weight_units' => $this->faker->buildingNumber,
            'height_units' => $this->faker->buildingNumber,
            'activity_level' => $this->faker->century,
            'user' => $this->faker->boolean($chanceOfGettingTrue = 2),
            'coach' => $this->faker->boolean($chanceOfGettingTrue = 3),
            'tnc' => $this->faker->boolean($chanceOfGettingTrue = 4),
        ];
    }
}
