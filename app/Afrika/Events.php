<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'country',
        'city',
        'venue',
        'image_path'
    ];
}
