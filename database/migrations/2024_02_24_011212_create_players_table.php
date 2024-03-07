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
        $table->timestamps(); // created_at, updated_at

        // 打者成績
        $table->integer('at_bats')->nullable();
        $table->integer('runs')->nullable();
        $table->integer('stolen_bases')->nullable();
        $table->integer('doubles')->nullable();
        $table->integer('triples')->nullable();
        $table->float('ops')->nullable();
        $table->integer('walks')->nullable();
        $table->integer('sacrifice_hits')->nullable();
        $table->integer('sacrifice_flies')->nullable();
        $table->integer('count')->nullable();
        $table->integer('hit')->nullable();
        $table->integer('rbi')->nullable();
        $table->integer('home_run')->nullable();
        $table->float('base_avg')->nullable();
        $table->float('long_avg')->nullable();
        $table->integer('game_count')->nullable();

        // 投手成績
        $table->float('era')->nullable();
        $table->integer('wins')->nullable();
        $table->integer('losses')->nullable();
        $table->float('winning_percentage')->nullable();
        $table->integer('complete_games')->nullable();
        $table->integer('shutouts')->nullable();
        $table->integer('hits_allowed')->nullable();
        $table->integer('home_runs_allowed')->nullable();
        $table->integer('strikeouts')->nullable();
        $table->integer('walks_allowed')->nullable();
        $table->float('inning')->nullable();
        $table->integer('conceded_points')->nullable();
        $table->integer('pitched')->nullable();

        // その他
        $table->string('image')->nullable();
    });
}

    public function down()
    {
        Schema::dropIfExists('players');
    }
}

