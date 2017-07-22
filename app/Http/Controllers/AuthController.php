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

    public function provider(){
        return Socialite::driver('twitter')->redirect();

    }


    public function callback(){

        try{
            $user=Socialite::driver('twitter')->user();
        }
        catch(Exception $e){
            return redirect('/auth');
        }

        $authUser=$this->findUser($user);

        Auth::login($authUser,true);
        return redirect("/home/$authUser->handle");
    }

    //get timeline by screen_name
    public function timeline($id)
    {


        $tweets= Twitter::getUserTimeline(['screen_name' => $id, 'count' => 10, 'format' => 'array']);
        $followerResult=Follower::where('user_id',Auth::user()->id)->get();
        return view('home',compact('followerResult','tweets'));
    }


    public function findUser($twitterUser){
        $authUser = User::where('twitter_id',$twitterUser->id)->first();

        if($authUser){
            return $authUser;
        }

        $newUser= User::create([
            'name' => $twitterUser->name,
            'handle' => $twitterUser->nickname,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar_original,
        ]);
        $followers = Twitter::getFollowers(['screen_name'=>$newUser->handle,'format'=>'array']);

        foreach ($followers['users'] as $follower) {

                //dd($follow);
                Follower::create([
                    'user_id'=>$newUser->id,
                    'name'=>$follower['name'],
                    'screen_name'=>$follower['screen_name'],
                ]);
        }

        return $newUser;
    }




}
