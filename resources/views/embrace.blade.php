<!DOCTYPE html>
<html>
<head>
	<title>Think Like A Programmer</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="all" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-xs-offset-4">
		<a href="{{url('/')}}"><img src="{{url('images/TLAP.jpg')}}" width="350px"></a>
		</div>
		</div>

    @yield('content')

  <br>
  <br>
  </div>
  <hr>
  <div class="container">
  <div class="row">
  <a href="https://www.facebook.com/ieeenajah"><img src="{{url('images/SBLogo.png')}}" width="150px" class="col-xs-offset- col-sm-offset-4"></a>
  <a href="https://www.facebook.com/ieeenajah"><img src="{{url('images/cs.jpg')}}" width="150px" class="col-xs-offset-1"></a>
  </div>
  </div>
</body>
</html>
