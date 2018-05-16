<?php

namespace App\Afrika;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'conversation';

    protected $fillable = [
        'title',
        'creator_id',
        'channel_id'
    ];

    public function participants(){
        return $this->hasMany(Participants::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }
}
