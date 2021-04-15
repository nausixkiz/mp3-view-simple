<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $fillable = [
        'title', 'name', 'size', 'extension'
    ];

    public function ratings(){

        return $this->hasMany(Rating::class, 'music_id');
    }
}
