<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $primaryKey = "id";

    protected $connection = "daweng";

    protected $fillable = [
        'description', 'name', 'image', 'old_price', 'new_price', 'category',
        'qty'
    ];
}
