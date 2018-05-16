<?php

namespace App\Afrika;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'participants';

    protected $fillable = [
        'user_id',
        'conversation_id'
    ];

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function participant(){
        return $this->belongsTo(User::class);
    }
}
