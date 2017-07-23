<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;
use Auth;
use Socialite;
class SendTweets extends Controller
{
    public function send(){
        return $tweets= Twitter::getUserTimeline(['screen_name' => Auth::user()->id, 'count' => 10, 'format' => 'array']);
    }
}
