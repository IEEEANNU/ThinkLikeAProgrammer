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

get('/',function(){
  return "<center><h1>sign in please</h1></center>";
});

post('/',function(){
  //post form data
});

get('signup', function () {
    return "<center><h1>Sign Up Page is here</h1></center>";
});

post('signup',function(){
  //post form data
});

get('{username}',function($username){
  return "<center><h1>You're logged in as ".$username."</h1></center";
});

get('{username}/questions',function($username){
  return "<center><h1>Questions page</h1></center>";
});

get('{username}/questions/{level}',function($username,$level){
  return Redirect($username.'/questions');
});

get('{username}/questions/{level}/{qid}',function($username,$level,$qid){
  return "<center><h1>This is level ".$level.", question ".$qid.".</h1></center>";
});
