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

get('/','signInCtrl@index');
post('/','signInCtrl@store');
get('signup', 'signUpCtrl@index');
post('signup','signUpCtrl@store');
get('{username}','profileCtrl@index');
get('{username}/{level}',function($username,$level){return Redirect($username);});
get('{username}/{level}/{qid}','questionCtrl@show');
