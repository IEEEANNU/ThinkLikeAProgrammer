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
Route::get('/leaderboard','HomeController@leaderboard');
Route::get('login','Auth\AuthController@getLogin');
Route::post('login','Auth\AuthController@postLogin');
Route::get('signup','Auth\AuthController@getRegister');
Route::post('signup','Auth\AuthController@postRegister');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::group(['middleware' => 'auth'], function($router){
    $router->resource('profile','ProfileController');
    Route::group(['as' => 'Submission::', 'prefix' => 'question/{questionId}'], function($r){
        $r->post('submit', ['as' => 'submit', 'uses' => 'SubmissionController@submit']);
        $r->get('submissions/', ['as' => 'index', 'uses' => 'SubmissionController@index']);
        $r->get('submissions/{id}', ['as' => 'show', 'uses' => 'SubmissionController@show']);
    });
    Route::group(['as' => 'Assessment::', 'prefix' => 'question/{questionId}/submissions/{submissionId}'], function($r){
        $r->post('assess', ['as' => 'assess', 'uses' => 'AssessmentController@assess']);
        $r->get('assessments/', ['as' => 'index', 'uses' => 'AssessmentController@index']);
    });
    $router->get('question/{questionId}/hint', 'QuestionController@hint');
    $router->resource('question','QuestionController');
});
