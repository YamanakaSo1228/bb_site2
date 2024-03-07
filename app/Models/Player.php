<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function scores()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }

    // テーブル名
    protected $table = 'players';

    // 可変項目
    protected $fillable = [
        'position',
        'avg',
        'era',
        'uniform_number',
        'player_name',
        'count',
        'hit',
        'rbi',
        'home_run',
        'base_avg',
        'long_avg',
        'game_count',
        'inning',
        'conceded_points',
        'pitched',
        'image',
        'at_bats',
        'runs',
        'stolen_bases',
        'doubles',
        'triples',
        'ops',
        'walks',
        'sacrifice_hits',
        'sacrifice_flies',
        'wins',
        'losses',
        'winning_percentage',
        'complete_games',
        'shutouts',
        'hits_allowed',
        'home_runs_allowed',
        'strikeouts',
        'walks_allowed',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'player_games')
            ->withPivot('game_position', 'at_bats', 'hit', 'position', 'conceded_points')
            ->withTimestamps();
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
