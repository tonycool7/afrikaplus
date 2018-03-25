<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'album';

    protected $fillable = [
        'title',
        'image_path',
        'artist'
    ];

    public function songs(){
        return $this->hasMany(Music::class);
    }
}
