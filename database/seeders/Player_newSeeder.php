<?php

namespace Database\Seeders;

use App\Models\Player_new;
use Illuminate\Database\Seeder;

class Player_newSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        player_new::factory()->count(10)->create();
    }
}
