<?php


/*
 * return login response
 */
Route::get('/', function () {
    return view('login');
})->name('login')->middleware(['guest']);

/*
 *redirect user to Authenticate on twitter
 */
Route::get('/auth', 'AuthController@provider')->name('twitter.login');

/*
 *callback route when user successfully authenticated by Twitter
 */
Route::get('/callback', 'AuthController@callback')->name('twitter.callback');

/*
 * Error
 */
Route::get('/error', function () {
    return view('error');
})->name('twitter.error');

/*
 *All Routes inside group will be checked for user's authentication by 'auth' middleware
 */
Route::group(['middleware'=>['auth']], function () {
    /*
     *Return 10 Tweets and 10 Followers of logged in user
     */
    Route::get('home', 'TwitterController@getTimeline')->name('home');

    /*
     *Send PDF of user's tweets to his email
     */
    Route::post('sendPDF', 'TwitterController@sendMail');

    /*
     * Download tweets in PDF
     */
    Route::get('/download', 'TwitterController@download');

    /*
     *Post tweet on user's timeline
     */
    Route::post('postTweet', 'TwitterController@postTweet');

    /*
     * Log out
     */
    Route::get('logout', 'AuthController@logout')->name('twitter.logout');

    /*
     *Ajax call for searching Followers
     */
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

    /*
     *Ajax call for tweets slider of a Follower
     */
    Route::get('changeSlider', function () {
        if (Request::ajax()) {
              $handle=request('handle');
            //Get 10 Tweets Of Clicked Follower
            $tweets= \Twitter::getUserTimeline([
                  'screen_name' => $handle,
                  'count' => 10,
                  'format' => 'array']);
                  request()->session()->flash('ajax', $handle);
            //return new slider with 10 tweets of clicked Follower
            return view('ajax.ajax-slider', compact(['tweets']));
        }
    });

});
