<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for table followers
 */
class Follower extends Model
{
    /*
     * mass assignment fields
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'screen_name'
    ];
}
