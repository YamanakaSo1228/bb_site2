<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'games';

    protected $fillable =
    [
        'opponent',
        'game_comment',
        'score',
        'order',
        'error',
        'hit',
        'total',
        'top_first',
        'bottom_first',
        'top_second',
        'bottom_second',
        'top_third',
        'bottom_third',
        'top_fourth',
        'bottom_fourth',
        'top_fifth',
        'bottom_fifth',
        'top_sixth',
        'bottom_sixth',
        'top_seventh',
        'bottom_seventh',
        'top_eighth',
        'bottom_eighth',
        'top_ninth',
        'bottom_ninth',
        'top_tenth',
        'bottom_tenth',
        'game_date',
        'bottom_error',
        'bottom_total',
        'bottom_hit',
        'top_error',
        'top_hit',
        'top_hit',
        'flip',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_games')
            ->withPivot('game_position', 'at_bats', 'hit', 'position', 'conceded_points')
            ->withTimestamps();
    }

}
