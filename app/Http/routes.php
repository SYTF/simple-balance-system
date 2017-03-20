<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['auth']], function (){
  // Route::get('/', function () {
  //     return redirect('rewards');
  // });

  Route::resource('/', 'RewardController');
  // Route::resource('rewards', 'RewardController');
});
Route::get('/getRewardList', function(App\Reward $rewards){
  return response()->json( $rewards->orderby('created_at', 'desc')->paginate(10) );
});


Auth::routes();

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
