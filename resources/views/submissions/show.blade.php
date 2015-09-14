@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div id="successfulSubmission" class="alert alert-success fade in hidden">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Your assessment has been recorded.
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-default" href="{{route('Submission::index', ['questionId' => $question->id])}}">&#8592; Back to submissions</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <h1>{{ $question->name }}</h1>
            <h3>Submitted by {{$submission->user->name}}</h3>
            <p>{{ $question->description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Question:</h3>
            <div width="400" height="400" style="position: relative;">
            <img src="{{asset('images/questions/'.$question->image)}}" alt="">
            <canvas class="measure" width="400" height="400" 
            style="position: absolute; left: 0; top: 0; z-index: 1;"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Submission:</h3>
            <div width="400" height="400" style="position: relative;">
            <img src="{{$submission->image}}" alt="">
            <canvas class="measure" width="400" height="400" 
            style="position: absolute; left: 0; top: 0; z-index: 1;"></canvas>
            </div>
        </div>
    </div>
    <!-- TODO diff & assess -->
</div>

<iframe class="game" src="{{'https://thinklikeaprogrammer.appspot.com/static/apps/turtle/index.html?blocks='.$submission->blocks}}" width="95%" height="655" sandbox="allow-same-origin allow-scripts"></iframe>

@stop

@section('scripts')
<script type="text/javascript">
    
    $(function(){
        $('.measure').each(function(){
            createMeasurement(this);
        })
    });
</script>
@stop