<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            // 新しいカラムの追加
            $table->id(); // 試合ID
            $table->integer('player_id')->nullable(); // 選手ID
            $table->string('opponent')->nullable(); // 対戦相手
            $table->boolean('flip')->default(0);
            $table->text('game_comment')->nullable(); // 試合コメント
            $table->integer('score')->nullable(); // スコア
            $table->integer('order')->nullable(); // 打順
            $table->integer('error')->nullable(); // 失策集
            $table->integer('hit')->nullable(); // ヒット
            $table->integer('total')->nullable(); // 合計得点
            $table->timestamp('game_date')->nullable(); // 試合の日時
            $table->timestamps(); // created_at, updated_at

            // 既存のカラム
            $table->integer('top_first')->nullable();
            $table->integer('top_second')->nullable();
            $table->integer('top_third')->nullable();
            $table->integer('top_fourth')->nullable();
            $table->integer('top_fifth')->nullable();
            $table->integer('top_sixth')->nullable();
            $table->integer('top_seventh')->nullable();
            $table->integer('top_eighth')->nullable();
            $table->integer('top_ninth')->nullable();
            $table->integer('top_tenth')->nullable();
            $table->integer('top_total')->nullable();
            $table->integer('top_hit')->nullable();
            $table->integer('top_error')->nullable();

            $table->integer('bottom_first')->nullable();
            $table->integer('bottom_second')->nullable();
            $table->integer('bottom_third')->nullable();
            $table->integer('bottom_fourth')->nullable();
            $table->integer('bottom_fifth')->nullable();
            $table->integer('bottom_sixth')->nullable();
            $table->integer('bottom_seventh')->nullable();
            $table->integer('bottom_eighth')->nullable();
            $table->integer('bottom_ninth')->nullable();
            $table->integer('bottom_tenth')->nullable();
            $table->integer('bottom_total')->nullable();
            $table->integer('bottom_hit')->nullable();
            $table->integer('bottom_error')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}


