		@extends('embrace');

    @section('content');
    <div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">Username</span>
		  <input type="text" class="form-control" placeholder="I.e: TamerHN" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">@</span>
		  <input type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">Password</span>
		  <input type="password" class="form-control" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group col-xs-4">
		  <span class="input-group-addon" id="basic-addon1" style="width:140px">Confirm Password</span>
		  <input type="password" class="form-control" aria-describedby="basic-addon1">
		</div>
		<br>
		<button type="button" class="col-xs-4 col-lg-offset-4 btn btn-info">Sign Up</button>
    @stop
