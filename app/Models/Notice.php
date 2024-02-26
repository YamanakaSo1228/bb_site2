<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'notices';

    //可変項目
    protected $fillable =
    [
        'notice_title',
        'notice_text'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
