		@extends('embrace')

    @section('content')

		<form action="signup/" method="POST">
			{!! csrf_field() !!}
			<table class="table" style="width:50%; margin:0 auto">
				@if(count($errors)>0)
					<tr>
						<td colspan="2">
							<div class="alert alert-danger">
									<ul>
										@@foreach($$errors->all as $error)
											<li>{{$error}}</li>
										@endforeach
									</ul>
							</div>
						</td>
					</tr>
				@endif
			</table>
	    <div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Username</span>
			  <input name="username" type="text" class="form-control" placeholder="I.e: TamerHN" aria-describedby="basic-addon1">
			</div>
			<br>
			<div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">@</span>
			  <input name="email" type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
			</div>
			<br>
			<div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Password</span>
			  <input name="password" type="password" class="form-control" aria-describedby="basic-addon1">
			</div>
			<br>
			<div class="input-group col-xs-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Confirm Password</span>
			  <input name="confirmpassword" type="password" class="form-control" aria-describedby="basic-addon1">
			</div>
			<br>
			<button type="submit" class="col-xs-4 col-lg-offset-4 btn btn-info">Sign Up</button>
		</form>
    @stop
