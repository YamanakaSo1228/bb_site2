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
            'player_name' => $this->faker->name,
            'position' => $this->faker->numberBetween(1, 8),
            'uniform_number' => $this->faker->numberBetween(1, 99),
            'avg' => $this->faker->randomFloat(3, 0, 1),
            'at_bats' => $this->faker->numberBetween(1, 100),
            'runs' => $this->faker->numberBetween(1, 50),
            'stolen_bases' => $this->faker->numberBetween(1, 20),
            'doubles' => $this->faker->numberBetween(1, 20),
            'triples' => $this->faker->numberBetween(1, 10),
            'ops' => $this->faker->randomFloat(3, 0, 1),
            'walks' => $this->faker->numberBetween(1, 30),
            'sacrifice_hits' => $this->faker->numberBetween(1, 10),
            'sacrifice_flies' => $this->faker->numberBetween(1, 10),
            'count' => $this->faker->numberBetween(1, 100),
            'hit' => $this->faker->numberBetween(1, 50),
            'rbi' => $this->faker->numberBetween(1, 30),
            'home_run' => $this->faker->numberBetween(1, 20),
            'base_avg' => $this->faker->randomFloat(3, 0, 1),
            'long_avg' => $this->faker->randomFloat(3, 0, 1),
            'game_count' => $this->faker->numberBetween(1, 50),
            'era' => $this->faker->randomFloat(2, 0, 10),
            'wins' => $this->faker->numberBetween(1, 20),
            'losses' => $this->faker->numberBetween(1, 20),
            'winning_percentage' => $this->faker->randomFloat(3, 0, 1),
            'complete_games' => $this->faker->numberBetween(1, 20),
            'shutouts' => $this->faker->numberBetween(1, 10),
            'hits_allowed' => $this->faker->numberBetween(1, 100),
            'home_runs_allowed' => $this->faker->numberBetween(1, 20),
            'strikeouts' => $this->faker->numberBetween(1, 100),
            'walks_allowed' => $this->faker->numberBetween(1, 30),
            'inning' => $this->faker->numberBetween(1, 100),
            'conceded_points' => $this->faker->numberBetween(1, 100),
            'pitched' => $this->faker->numberBetween(1, 100),
        ];
    }
}

