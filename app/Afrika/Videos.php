<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'videos';

    protected $fillable = [
        'title',
        'artist',
        'path'
    ];

    public function comments(){
        $this->hasMany(Comments::class, 'comment_id');
    }
}
