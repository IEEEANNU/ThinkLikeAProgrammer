		@extends('embrace');

    @section('content');
    <div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">Username</span>
		  <input type="text" class="form-control" placeholder="I.e: TamerHN" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">Password</span>
		  <input type="password" class="form-control" aria-describedby="basic-addon1">
		</div>
		<br>
		<button type="button" class="col-xs-4 col-lg-offset-4 btn btn-info">Sign in</button>
		<br><br><br>
		<p class="col-xs-4 col-lg-offset-4">Don't have account? then <a style="cursor:pointer">SignUp</a>!</p>
    <br/>
    <br>
    <br>
    @stop
