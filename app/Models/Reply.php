<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'body'];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
