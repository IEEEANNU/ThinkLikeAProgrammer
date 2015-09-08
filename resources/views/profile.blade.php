<!DOCTYPE html>
<html>
<head>
	<title>Think Like A Programmer</title>
	<link href="{{asset('css/bootstrap.min.css')}}" media="all" rel="stylesheet" />
</head>
<body>

		<div class="row">
			<div class="col-lg-1" style="margin-left:40px">
				<div  style="margin-top:20px">
					<a href="https://www.facebook.com/ieeenajah"><img src="{{asset('images/SBLogo.png')}}" width="100px" class=""></a>
				</div>
				<div style="margin-top:20px">
					<a href="https://www.facebook.com/ieeenajah"><img src="{{asset('images/cs.jpg')}}" width="100px"></a>
				</div>
			</div>
			<div class="col-lg-2 col-lg-offset-2">
				<img src="{{asset('images/TLAP.jpg')}}" width="350px">
			</div>

			@if(Auth::check())
				<div class="col-lg-offset-2">
					Welcome: {{ Auth::user()->name }}
				</div>
			@endif

		</div>
		<hr>

		<div class="row">
			<div class="col-lg-8 col-lg-offset-1" >
				<div class="">

					<table class="table table-hover">
					    <thead>
					      <tr>
					        <th>Question#</th>
					        <th>Level#</th>
					        <th>Name</th>
					        <th>Mark</th>
					      </tr>
					    </thead>
					    <tbody>
								@foreach($questions as $question)
									<tr>
										<td>{{$question->id}}</td>
										<td>{{$question->level}}</td>
										<td>{{$question->name}}</td>
										<td>{{$question->value}}</td>
									</tr>
								@endforeach
					    </tbody>
					  </table>
				</div>
			</div>
			<div class=" col-lg-2 col-lg-offset-0 well">
				<div class="row">
					<center><label style="font-size:21px; color:#19a2e4;">Leaderboard</label></center>
					<hr>
				</div>
				<div class="row">
					<?php $i = 1 ?>
					@foreach($leaders as $leader)
						<div class="" style="height:25px;">
							{{$i++}}.<span>{{$leader->name}}</span>
							<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="10" aria-valuemax="100" style="width:{{$leader->total_score}}%">
									<span id="topscore{{$leader->id}}">{{$leader->total_score}}</span>
									</div>
							</div>
						</div>
						<br>
					@endforeach

					<div class=""><hr></div>
@if(Session::has('userSession'))
<p>hello</p>
<?php $a = []; $a = session()->pull('userSession'); ?>
{{ $a[0] }}
@endif
					<div class="row">
						<center><label style="font-size:17px; color:#19a2e4;">You are #<span>6</span></label></center>
					</div>
					<div class="" style="height:25px;">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%">
								<span data-width="10">10</span>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
