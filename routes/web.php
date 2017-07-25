    <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Root Route
Route::get('/', function () {
    return view('welcome');
})->name('login');

//Authentication by Twitter
Route::get('/auth','AuthController@provider');

//return here if successfully authenticate
Route::get('/callback/twitter','AuthController@callback');

Route::group(['middleware'=>['auth']],function(){
    //Return to this route to display slider and follower
    Route::get('home/{id}', 'TwitterController@timeline')->name('home');

    //Send Tweets PDF to Given Email
    Route::post('sendPDF','TwitterController@sendMail');

    //Ajax route call for Follower Search
    Route::POST('searchFollowers',function(){
        if(Request::ajax()){
            //get searched name
            $followerName=request('search');
            //Find Matching Names of Follower
            $followerResult=App\Follower::where('name','like',"%$followerName%")
            ->where('user_id',Auth::user()->id)
            ->get();
            //Return List of matching Followers
            return view('followerlist',compact(['followerResult']));

        }
    });

    //Ajax Route call for tweets slider of a Follower
    Route::get('changeSlider',function(){
        if(Request::ajax()){
            //Get 10 Tweets Of Clicked Follower
            $tweets= \Twitter::getUserTimeline(['screen_name' => request('handle'), 'count' => 10, 'format' => 'array']);
            //return new slider with tweets of clicked Follower
            return view('slider',compact(['tweets','handle']));
        }
    });

});
