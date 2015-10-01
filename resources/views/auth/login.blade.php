		@extends('embrace')

    @section('content')

		<form action="{{url('login')}}" method="POST">
			{!! csrf_field() !!}
			<table class="table" style="width:50%; margin:0 auto">
				@if(count($errors)>0)
					<tr>
						<td colspan="2">
							<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{$error}}</li>
										@endforeach
									</ul>
							</div>
						</td>
					</tr>
				@endif
			</table>
			<div class="form-group">
	        <div class="input-group col-xs-12 col-md-4 col-md-offset-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Email</span>
			  <input name="email" type="text" class="form-control" placeholder="e.g.: ex@example.com" aria-describedby="basic-addon1" value="{{old('email')}}">
			</div>
			</div>
			<div class="form-group">
			<div class="input-group col-xs-12 col-md-4 col-md-offset-4">
			  <span class="input-group-addon" id="basic-addon1" style="width:140px">Password</span>
			  <input name = "password" type="password" class="form-control" aria-describedby="basic-addon1">
			</div>
			</div>
			<div class="form-group">
			<button type="submit" class="col-xs-12 col-md-4 col-md-offset-4 btn btn-info">Sign in</button>
			</div>
		</form>
		<br>
		<div class="row">
		<p class="col-xs-12 col-md-4 col-md-offset-4">Don't have account? then
		<a href="{{route('signupGet')}}">sign up</a>
		</div>
    <br>
    <br>
    <br>
    @stop
