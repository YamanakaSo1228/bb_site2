<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use Database\Factories\PlayerFactory;
use Database\Seeders\playersSeeder;
use App\Models\Game;
use Database\Factories\GameFactory;
use Database\Seeders\GameSeeder;
use Database\Seeders\BattingRecordSeeder;
use Database\Factories\BattingRecordFactory;
use Database\Seeders\TeamsTableSeeder;
use Database\Factories\TeamFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Models\Player::factory(10)->create();
        // $this->call([
        //     PlayerTableSeeder::class, // User追加のseederを呼び出すように追加
        // ]);
        // $this->call([
        //     GameSeeder::class, // User追加のseederを呼び出すように追加
        // ]);
        // $this->call([
        //     BattingRecordSeeder::class, // User追加のseederを呼び出すように追加
        // ]);
        // $this->call([
        //     InquirySeeder::class, // User追加のseederを呼び出すように追加
        // ]);
        // $this->call([
        //     TeamsTableSeeder::class
        // ]);
        $this->call(AdminSeeder::class);
    }
}
