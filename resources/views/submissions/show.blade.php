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
        <div class="col-md-3 pull-right btn-group">
            @if(!empty($prevId))
            <a class="btn btn-default" href="{{route('Submission::show', ['questionId' => $question->id, 'id' => $prevId])}}">&#8592; Previous</a>
            @endif
            @if(!empty($nextId))
            <a class="btn btn-default" href="{{route('Submission::show', ['questionId' => $question->id, 'id' => $nextId])}}">Next &#8594;</a>
            @endif
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6" >
            <h1>{{ $question->name }}</h1>
            <h3>Submitted by {{$submission->user->name}}, {{$submission->user->email}}</h3>
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
    <div class="row">
        <div class="col-md-6">
        <form id="assessmentForm" method="post" action="">
            <label for="grade">Grade:</label>
            <input type="range" name="grade" id="grade" class="grade" value="50" min="0" max="100">
            <input type="text" class="grade form-control col-md-2" value="50">
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
        </div>
    </div>
    <!-- TODO diff -->
</div>

<iframe class="game" src="{{url('/game/apps/turtle/index.html')}}" width="95%" height="655" sandbox="allow-same-origin allow-scripts"></iframe>

@stop

@section('scripts')
<script type="text/javascript">
    var defaultXml = '<xml>' + decodeURIComponent('{{$submission->blocks}}') + '</xml>';
    $(function(){
        $('.measure').each(function(){
            createMeasurement(this);
        });
        $('.grade').change(function(){
            var value = $(this).val();
            value = value > 100 ? 100 : (value<0? 0: value);
            $('.grade').each(function(){
                $(this).val(value);
            });
        });
    });
    $('.game').on('load', function(){
        var BlocklyApps  = this.contentWindow.BlocklyApps;
        BlocklyApps.loadBlocks(defaultXml);
    })
    $('#assessmentForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            data: {
                grade: $(this).find('input#grade').val()/100.0
            },
            type: 'POST',
            url: "{{route('Assessment::assess', ['questionId' => $question->id, 'submissionId' => $submission->id])}}",
            success: function(response) {
                $('#successfulSubmission').removeClass('hidden');
                window.scrollTo(0, 0);
            }
        });
    })
</script>
@stop