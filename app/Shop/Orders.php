<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $primaryKey = "id";

    protected $connection = "daweng";

    protected $fillable = [
        'status',
        'user_id',
        'total',
        'product_id',
        'qty',
        'payment_method'
    ];

    public function products(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}
