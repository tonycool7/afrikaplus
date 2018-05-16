<?php

namespace App\Afrika;

use Illuminate\Database\Eloquent\Model;

class Block_list extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'block_list';

    protected $fillable = [
        'user_id',
        'participants_id'
    ];

    public function isRestrictedAccessTo($id){
        return \Auth::user()->where('participants_id', '=', $id)->first() ? 1 : 0;
    }
}
