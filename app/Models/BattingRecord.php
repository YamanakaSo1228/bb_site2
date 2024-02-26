<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class BattingRecord extends Model
{
    use HasFactory;

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
    //テーブル名
    protected $table = 'batting_records';

    //可変項目
    protected $fillable =
    [
        'count',
        'hit',
        'avg',
        'rbi',
        'home_run',
        'base_avg',
        'long_avg',
        'game_count'
    ];

    public function battingRecord()
    {
        return $this->hasOne(BattingRecord::class);
    }
}
