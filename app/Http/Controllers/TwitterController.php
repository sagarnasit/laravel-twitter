<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;
use Auth;
use Socialite;
use App\Follower;
use App\User;
use Mail;
use PDF;
class TwitterController extends Controller
{
    //get timeline by screen_name
    public function timeline($id)
    {

        $tweets= Twitter::getUserTimeline(['screen_name' => $id, 'count' => 10, 'format' => 'array']);
        $followerResult=Follower::where('user_id',Auth::user()->id)->get();
        return view('home',compact('followerResult','tweets'));
    }

    public function send(){
        return $tweets= Twitter::getUserTimeline(['screen_name' => Auth::user()->handle ,'count'=>3200 ,'format' => 'array']);
    }

    public function sendMail(){

        $tweets= Twitter::getUserTimeline(['screen_name' => Auth::user()->handle ,'count'=>3200 ,'format' => 'array']);
        $pdf = PDF::loadView('tweets', ['tweets'=>$tweets]);

        // return $pdf->stream('pdf.pdf');
        Mail::send('mail', $tweets, function($message) use($pdf)
        {
            $message->from('saaagarnasit@gmail.com', 'Sagar');

            $message->to(request('email'))->subject('Tweets');

            $message->attachData($pdf->output(), "tweets.pdf");
        });
    }

    

}
