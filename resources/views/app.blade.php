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
        @yield('content')
    </body>
</html>
