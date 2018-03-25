<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Shop\Orders;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopUsers extends Authenticatable
{
    use Notifiable;

    protected $table = "shop_users";

    protected $guard = 'shopUser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id', 'id');
    }
}
