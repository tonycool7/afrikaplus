<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'music';

    protected $fillable = [
        'title',
        'album_id',
        'artist',
        'length',
        'music_path',
        'image_path',
        'uploaded_by'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
