<?php

namespace App\Afrika;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'comments';

    protected $fillable = [
        'comment',
        'user_id',
        'video_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
