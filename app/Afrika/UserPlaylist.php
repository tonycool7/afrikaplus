<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'user_playlist';

    protected $fillable = [
        'music_id',
        'playlist_id'
    ];

    public function music(){
        return $this->belongsTo(Music::class);
    }
}
