<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public $fillable = [
        'rating',
        'user_id',
        'music_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function music(){
        return $this->belongsTo(Music::class);
    }
}
