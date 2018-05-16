<?php

namespace App;

use App\Afrika\Block_list;
use App\Afrika\Conversation;
use App\Afrika\Participants;
use App\Afrika\Playlist;
use App\Afrika\Posts;
use App\Shop\Orders;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'phone','status', 'image', 'username', 'firstname', 'lastname', 'birthday', 'languages',
        'country', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function playlist(){
        return $this->hasMany(Playlist::class);
    }

    public function posts(){
        return $this->hasMany(Posts::class, 'user_id');
    }

    public function blockList(){
        return $this->hasMany(Block_list::class);
    }

    public function users_conversations(){
        return $this->hasMany(Conversation::class, 'creator_id');
    }

    public function other_conversations(){
        return $this->hasMany(Participants::class);
    }
}
