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

Route::get('/','HomeController@home');
Route::get('login','Auth\AuthController@getLogin');
Route::post('login','Auth\AuthController@postLogin');
Route::get('signup','Auth\AuthController@getRegister');
Route::post('signup','Auth\AuthController@postRegister');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::group(['middleware' => 'auth'], function($router){
    $router->resource('profile','ProfileController');
    $router->post('question/{questionId}/submit', 'SubmissionController@submit');
    $router->get('question/{questionId}/hint', 'QuestionController@hint');
    $router->resource('question','QuestionController');
});
