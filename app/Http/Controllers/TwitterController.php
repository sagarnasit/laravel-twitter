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
    /**
     * this function get 10 tweets and 10 followers from  logged in user
     * @return response with tweets slider and follower list
     */
    public function getTimeline()
    {
        $tweets= Twitter::getUserTimeline(['screen_name' => Auth::user()->handle, 'count' => 10, 'format' => 'array']);
        $followers= Follower::where('user_id', Auth::user()->id)->limit(10)->get();
        return view('home', compact('followers', 'tweets'));
    }

    /**
     * this function retrieve tweets of logged in user and generate pdf of tweets
     * @return it will return response previous view with 'successful' message
     */
    public function sendMail()
    {
        $this->validate(request(), ['email' => 'required|email']);
        $tweets= Twitter::getUserTimeline(['screen_name' => Auth::user()->handle, 'count'=>3200, 'format' => 'array']);
        $pdf = PDF::loadView('tweets', ['tweets'=>$tweets]);

        $this->send($tweets, $pdf);
        request()->session()->flash('status', 'Mail Sent');
        return redirect('/home');
    }

    /**
     * this function send pdf attachment of tweets to the email provided by user
     * @param  $tweets array of tweets
     * @param  $pdf contain Html page as PDF
     * @return void
     */
    private function send($tweets, $pdf)
    {
        Mail::send('mail', $tweets, function ($message) use ($pdf) {
            $message->from('saaagarnasit@gmail.com', 'Sagar Nasit');
            $message->to(trim(request('email')))->subject('Tweets');
            $message->attachData($pdf->output(), "tweets.pdf");
        });
        return;
    }

    /**
    * this function post tweet from logged in user's twitter account
    * @return response of successful tweet post
    */
    public function postTweet()
    {
          $tweet=trim(request('tweet'));
          Twitter::postTweet(['status' => $tweet, 'format' => 'json']);
          request()->session()->flash('status', 'Tweet Posted');
          return redirect('/home');
    }

}
