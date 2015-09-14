<!DOCTYPE html>
<html>
    <head>
        <title>Think Like A Programmer</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="all" rel="stylesheet" />
        <link href="{{asset('css/style.css')}}" media="all" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" media="all" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.theme.min.css" media="all" rel="stylesheet" />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="row">
        <div class="col-md-2" style="margin-left:40px">
            <div  style="margin-top:20px">
                <a href="https://www.facebook.com/ieeenajah"><img src="{{url('images/SBLogo.png')}}" width="100px" class=""></a>
            </div>
            <div style="margin-top:20px">
                <a href="https://www.facebook.com/ieeenajah"><img src="{{url('images/cs.jpg')}}" width="100px"></a>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <a href="{{url('/')}}"><img src="{{url('images/TLAP.jpg')}}" width="350px"></a>
        </div>
        <div class="col-md-2 col-md-offset-3">
            <br>
            <br>
            <h4>Welcome {{\Auth::user()->name}}!</h4>
            <a href="{{url('logout')}}" class="btn btn-danger">log out</a>
        </div>
        </div>
        <hr class="clear">
        @yield('content')
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('js/measurement.js')}}"></script>
        <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        </script>
        
        @yield('scripts')
    </body>
</html>
