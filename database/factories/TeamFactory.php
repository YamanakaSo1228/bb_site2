<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'team_title' => '幅広い年齢層で楽しく野球をしています',
            'team_text' => '京都府宇治市連盟の所属しており、現在はCクラスで活動を行っています。
                        このチームの特徴は幅広い年齢層でありながら、元気に楽しいことが特徴です。
                        最年少で19歳。最年長で55歳の方が所属しています。（ちなみに55歳はバリバリのレギュラーです(笑)',
        ];
    }
}
