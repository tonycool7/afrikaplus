<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'image',
        'video',
        'text'
    ];

    public function comments(){
        return $this->hasMany(Comments::class);
    }

    public function likes(){
        return $this->hasMany(Likes::class, 'post_id');
    }
}
