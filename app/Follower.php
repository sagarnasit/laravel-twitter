<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 'name', 'screen_name'
    ];
}
