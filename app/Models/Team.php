<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'teams';

    //可変項目
    protected $fillable =
    [
        'team_title',
        'team_text'
    ];
}
