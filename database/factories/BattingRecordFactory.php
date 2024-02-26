<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\BattingRecord;

class BattingRecordFactory extends Factory
{
    protected $model = BattingRecord::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // 'related_model_id' => RelatedModel::factory(),
            'count' => $this->faker->randomNumber($min = 1, $max = 150),
            'hit' => $this->faker->numberBetween($min = 1, $max = 99),
            'avg' => $this->faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 1),
            'rbi' => $this->faker->numberBetween($min = 1, $max = 99),
            'home_run' => $this->faker->numberBetween($min = 1, $max = 99),
            'base_avg' => $this->faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 1),
            'long_avg' => $this->faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 1),
            'game_count' => $this->faker->randomNumber($min = 1, $max = 50),
        ];
    }
}
