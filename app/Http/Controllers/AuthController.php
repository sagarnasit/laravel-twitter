<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Socialite;
use Twitter;
use App\Follower;

class AuthController extends Controller
{
    /**
     *Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function provider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function callback()
    {
        try {
            $user=Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('/auth');
        }

        $authUser=$this->findUser($user);

        Auth::login($authUser, true);
        return redirect("/home");
    }


    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findUser($twitterUser)
    {
        //check user already exist
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        //if not then create a new
        $newUser= User::create([
            'name' => $twitterUser->name,
            'handle' => $twitterUser->nickname,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar_original,
        ]);
        //create followers of new user
        $this->createFollowers($newUser);
        return $newUser;
    }

    /**
     * get followers of new user and insert into database
     * @param   $newUser newly created user information
     * @return  void
     */
    private function createFollowers($newUser)
    {
        $followers = Twitter::getFollowers(['screen_name'=>$newUser->handle,'format'=>'array']);

        /**
         * loop through all followers and insert into database
         */
        foreach ($followers['users'] as $follower) {
                Follower::create([
                    'user_id' => $newUser->id,
                    'name' => $follower['name'],
                    'screen_name' => $follower['screen_name'],
                ]);
        }
        return;
    }

}
