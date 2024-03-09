<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position' => $this->faker->numberBetween(1, 8),
            'uniform_number' => $this->faker->numberBetween(1, 99),
            'avg' => $this->faker->randomFloat(3, 0, 1),
            'era' => $this->faker->randomFloat(2, 0, 10),
            'player_name' => $this->faker->name,
            'count' => $this->faker->numberBetween(1, 100),
            'hit' => $this->faker->numberBetween(1, 50),
            'rbi' => $this->faker->numberBetween(1, 30),
            'home_run' => $this->faker->numberBetween(1, 20),
            'base_avg' => $this->faker->randomFloat(3, 0, 1),
            'long_avg' => $this->faker->randomFloat(3, 0, 1),
            'game_count' => $this->faker->numberBetween(1, 50),
            'at_bats' => $this->faker->numberBetween(1, 100),
            'runs' => $this->faker->numberBetween(1, 50),
            'stolen_bases' => $this->faker->numberBetween(1, 20),
            'doubles' => $this->faker->numberBetween(1, 20),
            'triples' => $this->faker->numberBetween(1, 10),
            'ops' => $this->faker->randomFloat(3, 0, 1),
            'walks' => $this->faker->numberBetween(1, 30),
            'sacrifice_hits' => $this->faker->numberBetween(1, 10),
            'sacrifice_flies' => $this->faker->numberBetween(1, 10),
        ];
    }
}

