<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player_new;

class player_newFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = player_new::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'position' => $this->faker->randomNumber($min = 1, $max = 8),
            'uniform _number' => $this->faker->numberBetween($min = 1, $max = 99),
            'avg' => $this->faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 1),
            'era' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10),
        ];
    }
}
