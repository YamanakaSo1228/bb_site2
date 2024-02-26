<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('notices')->insert([
            [
                'notice_title' => '重要なお知らせ',
                'notice_text' => '本日は休業です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notice_title' => 'イベントのお知らせ',
                'notice_text' => '7月15日にイベントを開催します。参加希望者はお知らせください。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notice_title' => 'メンテナンスのお知らせ',
                'notice_text' => 'サービスのメンテナンスのため、一時的にアクセスが制限されます。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notice_title' => 'もっと見るボタンのテスト',
                'notice_text' => 'もっと見るボタンが機能しているかのテストですよー。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
