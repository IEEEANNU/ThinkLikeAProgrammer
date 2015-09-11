<!DOCTYPE html>
<html>
    <head>
        <title>Think Like A Programmer</title>
        <link href="{{asset('css/bootstrap.min.css')}}" media="all" rel="stylesheet" />
        <link href="{{asset('css/style.css')}}" media="all" rel="stylesheet" />
        <link href="{{asset('css/jquery-ui.min.css')}}" media="all" rel="stylesheet" />
        <link href="{{asset('css/jquery-ui.theme.min.css')}}" media="all" rel="stylesheet" />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="row">
        <div class="col-md-2" style="margin-left:40px">
            <div  style="margin-top:20px">
                <a href="https://www.facebook.com/ieeenajah"><img src="{{asset('images/SBLogo.png')}}" width="100px" class=""></a>
            </div>
            <div style="margin-top:20px">
                <a href="https://www.facebook.com/ieeenajah"><img src="{{asset('images/cs.jpg')}}" width="100px"></a>
            </div>
        </div>
        <div class="col-md-2 col-lg-offset-2">
            <a href="{{url('/')}}"><img src="{{asset('images/TLAP.jpg')}}" width="350px"></a>
        </div>
        
        @yield('content')
        
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        </script>
        
        @yield('scripts')
    </body>
</html>
