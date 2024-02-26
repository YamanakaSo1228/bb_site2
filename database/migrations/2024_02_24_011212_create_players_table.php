<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id')->nullable();
            $table->string('player_name');
            $table->integer('position')->nullable();
            $table->integer('uniform_number')->nullable();
            $table->float('avg')->nullable();
            $table->float('era')->nullable();
            $table->timestamps(); // created_at, updated_at

            // 新しいカラムの追加
            $table->integer('count')->nullable();
            $table->integer('hit')->nullable();
            $table->integer('rbi')->nullable();
            $table->integer('home_run')->nullable();
            $table->float('base_avg')->nullable();
            $table->float('long_avg')->nullable();
            $table->integer('game_count')->nullable();
            $table->float('inning')->nullable();
            $table->integer('conceded_points')->nullable();
            $table->integer('pitched')->nullable();
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}

