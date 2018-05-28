<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'playlist';

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function music(){
        return $this->hasMany(UserPlaylist::class);
    }
}
