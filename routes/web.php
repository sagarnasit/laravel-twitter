<?php



//return login response if user isn't authenticated
Route::get('/', function () {
    return view('welcome');
})->name('login')->middleware(['guest']);

//redirect user to Authenticate by his twitter credentials
Route::get('/auth', 'AuthController@provider');

//callback route if user successfully authenticated by Twitter
Route::get('/callback', 'AuthController@callback');

Route::get('/error', function() {
    return view('error');
});
//All Routes inside group will be checked for user's authentication by 'auth' middleware
Route::group(['middleware'=>['auth']], function () {

    //Return 10 Tweets and 10 Followers of logged in user
    Route::get('home', 'TwitterController@getTimeline')->name('home');

    //Send PDF of user's tweets to his email
    Route::post('sendPDF', 'TwitterController@sendMail');

    //Post tweet from user's twitter Account
    Route::post('postTweet', 'TwitterController@postTweet');

    Route::get('logout', 'AuthController@logout');

    //Ajax call for searching Followers
    Route::POST('searchFollowers', function () {
        if (Request::ajax()) {
            //get searched name
            $followerName=trim(request('search'));

            //Find Matching Names of Follower inside follower table
            $followers= App\Follower::where('name', 'like', "%$followerName%")
                ->where('user_id', Auth::user()->id)
                ->get();

            //Return List of matched Followers
            return view('ajax.ajax-followerlist', compact(['followers']));

        }
    });

    //Ajax call for tweets slider of a Follower
    Route::get('changeSlider', function () {
        if (Request::ajax()) {
            //Get 10 Tweets Of Clicked Follower
            $tweets= \Twitter::getUserTimeline([
                  'screen_name' => request('handle'),
                  'count' => 10,
                  'format' => 'array']);

            //return new slider with 10 tweets of clicked Follower
            return view('ajax.ajax-slider', compact(['tweets', 'handle']));
        }
    });

});
