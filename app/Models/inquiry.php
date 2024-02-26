<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'inquiries';

    //可変項目
    protected $fillable =
    [
        'email',
        'title',
        'body',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function hasReplies()
    {
        return $this->replies()->exists();
    }
}
