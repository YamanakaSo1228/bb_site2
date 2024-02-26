<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BattingRecord;

class BattingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BattingRecord::factory()->count(10)->create();
    }
}
