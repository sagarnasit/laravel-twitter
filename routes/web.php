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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth','AuthController@provider');
Route::get('/callback/twitter','AuthController@callback');
Route::get('home/{id}', 'TwitterController@timeline')->name('home');
// Route::post('sendPDF', 'SendTweets@send');
// Route::get('sendPDF','TwitterController@send');
Route::post('sendPDF','TwitterController@sendMail');

Route::POST('searchFollowers',function(){
    if(Request::ajax()){
        $followerName=request('search');
        $followerResult=App\Follower::where('name','like',"%$followerName%")
        ->where('user_id',Auth::user()->id)
        ->get();

        return view('followerlist',compact(['followerResult']));

    }
});
