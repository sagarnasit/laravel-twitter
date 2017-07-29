<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model class for table followers
 */
class Follower extends Model
{
	
    protected $fillable = [
        'user_id', 'name', 'screen_name'
    ];
}
