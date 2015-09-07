		@extends('embrace')

    @section('content')

		<form action="/" method="POST">
			{!! csrf_field() !!}
	    <div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Username</span>
			  <input name="username" type="text" class="form-control" placeholder="I.e: TamerHN" aria-describedby="basic-addon1">
			</div>
			<br>
			<div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Password</span>
			  <input name = "password" type="password" class="form-control" aria-describedby="basic-addon1">
			</div>
			<br>
			<button type="submit" class="col-xs-4 col-lg-offset-4 btn btn-info">Sign in</button>
		</form>
		<br><br><br>

		<form action="signup" method="GET">
			{!! csrf_field() !!}
			<p class="col-xs-4 col-lg-offset-4">Don't have account? then
			<button class="btn btn-warning" type="submit" style="cursor:pointer; Display: inline-block"> SignUp</button>!</p>
		</form>
    <br/>
    <br>
    <br>
    @stop
