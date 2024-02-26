<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    //テーブル名
    protected $table = 'admins';

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }
    //可変項目
    protected $fillable =
    [
        'name',
        'email',
        'password',
        'locked_flg',
        'error_count',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
