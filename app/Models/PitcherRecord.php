<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PitcherRecord extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'pitcher_records';

    //可変項目
    protected $fillable =
    [
        'Inning',
        'era',
        'conceded_points',
        'game_count'
    ];
}
