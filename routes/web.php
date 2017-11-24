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

use Illuminate\Support\Facades\Auth;
use App\Match;

Route::get('/', function () {

    // Get Matches
    $matches = (new Match)->getThisWeeksMatches();

    // Get Feed Data
    $messages = DB::table('message')
        ->join('message_type', 'message_type.message_type_id', '=', 'message.message_type_id')
        ->select('message.*','message_type.message_type_name','message_type.message_type_icon')
        ->whereNotNull('approved_at')
        ->orderBy('approved_at','desc')
	    ->latest('message_id')
	    ->take(40)
        ->get();

    $messages->map(function($message,$key) {

        $media = explode('||',$message->message_media);

        \Carbon\Carbon::setLocale('nl');
        $approved_at = \Carbon\Carbon::createFromTimestamp(strtotime($message->approved_at),'Europe/Amsterdam');
        $difference = \Carbon\Carbon::now()->diffForHumans($approved_at);

        $message->message_media_first = array_shift($media);
        $message->difference = str_replace('later','geleden',$difference);
        return $message;
    });

    // Get Colors
    $colors = ['yellow','black','blue','grey'];

    return view('feed',[
        'messages' => $messages,
        'colors' => $colors,
        'matches' => $matches
    ]);
});

Route::get('/add-media','MessageController@addMedia');
Route::post('/save-media-file','MediaController@save');
Route::post('/save-step-media','MessageController@saveStepMedia');
Route::get('/add-details','MessageController@addDetails');
Route::post('/save-step-details','MessageController@saveStepDetails');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::get('/', 'IndexController@index');
    Route::resource('message','MessageController');
    Route::get('/message/{message}/status','MessageController@status');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
