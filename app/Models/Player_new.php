<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player_new extends Model
{

    use HasFactory;
    //テーブル名
    protected $table = 'players_new';

    //可変項目
    protected $fillable =
    [
        'position',
        'uniform_number',
        'avg',
        'era',
    ];
}
