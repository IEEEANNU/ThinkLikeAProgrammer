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

get('/','Auth\AuthController@getLogin');
post('/','Auth\AuthController@postLogin');
get('signup','Auth\AuthController@getRegister');
post('signup','Auth\AuthController@postRegister');
Route::resource('profile','profileCtrl');
//get('/profile',['middleware'=>'auth','uses','profileCtrl@index'])
//---------------
//Route::resource('{username}/{qid}','questionCtrl');
//----------------
// get('/','signInCtrl@index');
// post('/','signInCtrl@store');
// get('signup', 'signUpCtrl@index');
// post('signup','signUpCtrl@store');
// get('{username}','profileCtrl@index');
// get('{username}/{level}/{qid}','questionCtrl@show');
