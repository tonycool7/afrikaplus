<?php

namespace App\Afrika;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'messages';

    protected $fillable = [
        'sender_id',
        'participants_id',
        'conversation_id',
        'message',
        'message_type',
        'attachment_thumb_url',
        'attachment_url',
    ];

    public function sender(){
        return $this->belongsTo(User::class, 'senders_id');
    }

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function participants(){
        return $this->hasMany(User::class, 'participants_id');
    }
}
