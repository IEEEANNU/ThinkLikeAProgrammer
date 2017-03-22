@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div id="successfulSubmission" class="alert alert-success fade in hidden">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Your work has been submitted successfully! Please wait while we grade it.
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-default" href="{{url('profile')}}">&#8592; Go back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <h1>{{ $question->name}}</h1>
            <p>{{ $question->description }}</p>
        </div>
        <div class="col-md-6">
            <div width="400" height="400" style="position: relative;">
            <img src="{{asset('images/questions/'.$question->image)}}" alt="">
            <canvas id="measure" width="400" height="400" 
            style="position: absolute; left: 0; top: 0; z-index: 1;"></canvas>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-8">
            @if(!empty($question->hint_text))
            <button id="hint" class="btn btn-success btn-block">Hint</button>
            @endIf
        </div>
        <div class="col-md-2 pull-right">
            <button id="submit" class="btn btn-danger btn-block">Submit</button>
        </div>
    </div>
</div>

<iframe class="game" src="{{url('/game/apps/turtle/index.html')}}" width="95%" height="655" sandbox="allow-same-origin allow-scripts"></iframe>

<!-- Hint Modal -->
<div class="modal fade" id="hintModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hint</h4>
      </div>
      <div class="modal-body">
            @if($observation->hint_used)
                <div>
                    <p id="hintText">{{$question->hint_text}}</p>
                    <img id="hintImage" src="{{asset('images/hints/'.$question->hint_image)}}" alt="" 
                        class="{{empty($question->hint_image)? 'hidden': ''}}">
                </div>
            @else
                <div>
                    <p id="hintText"></p>
                    <img id="hintImage" src="" alt="" class="{{empty($question->hint_image)? 'hidden': ''}}">
                </div>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Confirm Hint Modal -->
<div class="modal fade" id="confirmHintModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Are you sure you want to see the hint?</h3>
        <p>That will cost you {{$question->hint_penalty * 100}}% of this level's score</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button id="hintConfirmed" type="button" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    var hintUsed = {{$observation->hint_used? 'true': 'false'}};
    
    $(function(){
        $('#submit').popover({
            content:'Please run your program first',
            placement:'bottom',
            container:'body',
            trigger:'manual'
        });
        createMeasurement($('#measure')[0]);
    });
    
    $('#submit').click(function(){
        var Blockly  = $('.game')[0].contentWindow.Blockly;
        var Turtle  = $('.game')[0].contentWindow.Turtle;

        // Has to be runned
        if (!Turtle.executed) {
            $('#submit').popover('show');
            return false;
        }
        $('#submit').popover('hide');
        
        var xml = Blockly.Xml.workspaceToDom(Blockly.getMainWorkspace());
        var blocks = encodeURIComponent(xml.innerHTML);
        var image = $('.game')[0].contentDocument.getElementById('display').toDataURL('image/jpeg',1.0);

        $.ajax({
            url:'{{url("question/".$question->id."/submit")}}',
            type: 'POST',
            data: {
                blocks: blocks,
                image: image
            },
            success: function(response) {
                $('#successfulSubmission').removeClass('hidden');
                window.scrollTo(0, 0);
            }
        });
    });

    $('#hint').click(function() {
        if (hintUsed) {
            $('#hintModal').modal('show');
        } else {
            $('#confirmHintModal').modal('show');
        }
    });
    
    $('#hintConfirmed').click(function() {
        $('#confirmHintModal').modal('hide');
        $.ajax({
            url:'{{url("question/".$question->id."/hint")}}',
            type: 'GET',
            data: {},
            success: function(response) {
                console.log(response);
                $('#hintModal').find('#hintText').text(response.data.text);
                $('#hintModal').find('#hintImage')[0].src = ('{{asset("images/hints/")}}/' + response.data.image);
                $('#hintModal').modal('show');
            }
        });
        
    });
</script>
@stop
