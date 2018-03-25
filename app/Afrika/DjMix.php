<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class DjMix extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'dj_mix';

    protected $fillable = [
        'title',
        'length',
        'dj',
        'music_path',
        'image_path'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
