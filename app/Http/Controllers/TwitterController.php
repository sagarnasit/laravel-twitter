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
        $tweets= Twitter::getHomeTimeline([ 'count' => 10, 'format' => 'array']);
        $followers= Follower::where('user_id', Auth::user()->id)->limit(10)->get();
        $credentials = Twitter::getCredentials(['include_email' => 'true', 'format' => 'array']);
        $email=$credentials['email'];
        return view('home', compact('followers', 'tweets', 'email'));
    }
    /**
    * this function retrieve tweets of logged in user and generate pdf of tweets
    * @return it will return response previous view with 'successful' message
    */
    public function sendMail()
    {
        $this->validate(request(), ['email' => 'required|email']);
        $tweets= $this->getTweets(Auth::user()->handle, 5);
        $pdf = PDF::loadView('tweets', ['tweets'=>$tweets, 'user' => Auth::user()->handle ]);
        $this->send($tweets, $pdf);
        request()->session()->flash('status', 'Mail Sent');
        return redirect('/home');
    }
    /**
    * this function send pdf attachment of tweets to the email provided by user
    * @param  $tweets collection of tweets
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
 	 * this function download tweets in pdf format.
 	 *
 	 * @param String $user is twitter handle of user whose tweets will be downloaded
 	 * @return force download of generated PDF
	 */
    public function download($user)
    {
          $tweets= $this->getTweets($user, 5);
          $pdf = PDF::loadView('tweets', ['tweets'=>$tweets, 'user' => $user]);
          return $pdf->download();
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
    /**
    * this function get tweets from user's timeline
    * @param $user is twitter handle of user
    * @param $max integer
    * @return array of tweets
    */
    private function getTweets($user, $max)
    {
        $count=0;//maintain count of number of responses from twitter api
        $tweets=array();//store tweets from every response
        $available=true;//look for the next response
        while ($available != false && $count!= $max) {
            $tweet= Twitter::getUserTimeline(['screen_name' => $user,
            'page' => $count, 'count'=>100,'format' => 'array']);
            if (empty($tweet)) {
                $available=false;
            } else {
                //store each tweet in array
                foreach ($tweet as $t) {
                    array_push($tweets, $t);
                }
            }
            $count++;
        }
        return $tweets;
    }

    /**
 	 *this  function search public user accounts
 	 * @return response of search result
	 */
    public function search()
    {
        $txt=request('searchtext');
        $searchResult = Twitter::search(['q' => $txt, 'format' => 'array' , 'count' => 5]);
        return view('search-result', compact(['searchResult', 'txt']));
    }
}
