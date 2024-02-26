<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerGame extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'playerGames';

    //可変項目
    protected $fillable =
    [
        'email',
        'password'
    ];
}
