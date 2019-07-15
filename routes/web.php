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
    return view('home');
/*    $user = \Auth::user();
    return view('home', ['user' => $user]);*/
})->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home2');

//Routes for email verification
Route::get('/verify/{email}','MailController@sendVerify')->name('sendVerify');
Route::get('/verify/{email}/{verifyToken}','MailController@verifyEmail')->name('verifyEmail');
//EMAIL
Route::get("/emailverify", function(){
   return view('email/mailverify');
});

//Routes for password reset
Route::get('/resetpassword/{email}','MailController@resetPassword')->name('resetPassword');
Route::get('/setpassword/{email}/{remember_token}', 'MailController@setPassword')->name('setPassword');
Route::get('/reset', 'MailController@newPassword')->name('newPassword');;

//SUCCESS PAGE
Route::get("/resetsuccess", function(){
   return response()
            ->view('resetpasswordsuccess');
})->name('resetPasswordSuccess');

//EMAIL
Route::get("/emailreset", function(){
   return view('email/mailreset');
});

Route::get('/uwu', function(){
	return view('email/mailverify');
});




Route::get('/sp', function(){
	return view('setnewpassword');
});


Route::get('/test', function(){
	return view('test');
});