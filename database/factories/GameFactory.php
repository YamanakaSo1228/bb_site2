<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;
use App\Models\Player;


class GameFactory extends Factory
{

    protected $model = Game::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'opponent' => $this->faker->text(50),
            'flip' => $this->faker->boolean(),
            'game_date' => $this->faker->dateTimeThisMonth(),
            'game_comment' => $this->faker->text(50),
            'score' => $this->faker->numberBetween(1, 9),
            'order' => $this->faker->numberBetween(1, 9),
            'top_error' => $this->faker->numberBetween(1, 9),
            'bottom_error' => $this->faker->numberBetween(1, 9),
            'top_hit' => $this->faker->numberBetween(0, 20),
            'bottom_hit' => $this->faker->numberBetween(0, 20),
            'top_total' => $this->faker->numberBetween(0, 15),
            'bottom_total' => $this->faker->numberBetween(0, 15),
            'top_first' => $this->faker->numberBetween(1, 9),
            'bottom_first' => $this->faker->numberBetween(1, 9),
            'top_second' => $this->faker->numberBetween(1, 9),
            'bottom_second' => $this->faker->numberBetween(1, 9),
            'top_third' => $this->faker->numberBetween(1, 9),
            'bottom_third' => $this->faker->numberBetween(1, 9),
            'top_fourth' => $this->faker->numberBetween(1, 9),
            'bottom_fourth' => $this->faker->numberBetween(1, 9),
            'top_fifth' => $this->faker->numberBetween(1, 9),
            'bottom_fifth' => $this->faker->numberBetween(1, 9),
            'top_sixth' => $this->faker->numberBetween(1, 9),
            'bottom_sixth' => $this->faker->numberBetween(1, 9),
            'top_seventh' => $this->faker->numberBetween(1, 9),
            'bottom_seventh' => $this->faker->numberBetween(1, 9),
            'top_eighth' => $this->faker->numberBetween(1, 9),
            'bottom_eighth' => $this->faker->numberBetween(1, 9),
            'top_ninth' => $this->faker->numberBetween(1, 9),
            'bottom_ninth' => $this->faker->numberBetween(1, 9),
            'top_tenth' => $this->faker->numberBetween(1, 9),
            'bottom_tenth' => $this->faker->numberBetween(1, 9),
        ];
    }
}
