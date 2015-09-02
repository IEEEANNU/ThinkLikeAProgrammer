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
				<div  style="margin-top:20px">
					<a href="https://www.facebook.com/ieeenajah"><img src="{{asset('images/cs.jpg')}}" width="100px"></a>
				</div>
			</div>
			<div class="col-lg-2 col-lg-offset-2">
				<img src="{{asset('images/TLAP.jpg')}}" width="350px">
			</div>

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
					        <th>Description</th>
					        <th>Mark</th>
					        <th>Solved?</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>1</td>
					    		<td>1</td>
					    		<td>Square</td>
					    		<td>Simple square</td>
					    		<td>5</td>
					    		<td>No</td>
					    	</tr>
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
					<div class="" style="height:25px;">
						1.<span class="nameIsHere"><!--?php echo $topPeople[2]; ?--></span>
						<div class="progress">
						  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="10" aria-valuemax="100" style="width:0">
								<span class="valueReached" id="topscore1" data-width=""></span>
                <!-- ? php echo htmlspecialchars($topScore[sizeof($topScore)-1]*100/$topScore[sizeof($topScore)-1]); ?> -->
                <!-- ?php echo $topScore[sizeof($topScore)-1] ?-->
							</div>
						</div>
					</div>
					<br>
					<div class="" style="height:25px;">
						2.<span class="nameIsHere"></span>
						<div class="progress">
						  	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"aria-valuemin="0" aria-valuemax="100" style="width:0px">
								<span class="valueReached" id="topscore2" data-width=""></span>
							</div>
						</div>
					</div>
					<br>
					<div class="" style="height:25px;">
						3.<span class="nameIsHere"></span>
						<div class="progress">
						    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="1000" style="width:0px">
								<span class="valueReached" id="topscore3" data-width=""></span>
							</div>
						</div>
					</div>

					<div class=""><hr></div>

					<div class="row">
						<center><label style="font-size:17px; color:#19a2e4;">You are #<span class="addHere"></span></label></center>
					</div>
					<div class="" style="height:25px;">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:0px">
								<span class="valueReached" data-width=""></span>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
