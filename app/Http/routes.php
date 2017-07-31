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
Route::get('login', ['as' => 'loginGet', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'loginPost', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('signup', ['as' => 'signupGet', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('signup', ['as' => 'signupPost', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('logout', ['as' => 'logoutGet', 'uses' => 'Auth\AuthController@getLogout']);
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
    Route::group(['as' => 'Question::', 'prefix' => 'question'], function($r){
        $r->get('create', ['as' => 'create', 'uses' => 'QuestionController@create']);
        $r->get('show/{id}', ['as' => 'show', 'uses' => 'QuestionController@show']);
        $r->post('store', ['as' => 'store', 'uses' => 'QuestionController@store']);
        $r->get('/{questionId}/hint', 'QuestionController@hint');
        $r->get('/{questionId}/activate',['as'=>'activate','uses'=> 'QuestionController@activate']);
        $r->get('/{questionId}/deactivate',['as'=>'deactivate','uses'=> 'QuestionController@deactivate']);
    });
    $router->get('level/create', 'LevelController@create');
    $router->get('assessAll/',['as'=>'assessAll','uses'=> 'AssessmentController@assessAll']);
    $router->post('upload/', 'AssessmentController@upload');
    $router->post('level/store', 'LevelController@store');
    $router->get('level/activate/{levelId}', 'LevelController@activate');
    $router->get('level/deactivate/{levelId}', 'LevelController@deactivate');
});
