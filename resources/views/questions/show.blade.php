@extends('app')

@section('content')
<hr>
<div class="row">
    <div class="col-md-8 col-md-offset-1" >
        <h1>{{ $question->name}}</h1>
        <p>{{ $question->description }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-md-offset-8">
        @if(!empty($question->hint_text))
        <button id="hint" class="btn btn-success">Hint ( {{$question->hint_penalty * 100}}% penalty )</button>
        @endIf
    </div>
    <div class="col-md-1">
        <button id="submit" class="btn btn-danger">Submit</button>
    </div>
</div>
<iframe class="game" src="{{url('/game/apps/turtle/index.html')}}" width="95%" height="655" sandbox="allow-same-origin allow-scripts"></iframe>
@stop

@section('scripts')
<script type="text/javascript">
$('#submit').click(function(){
    var Blockly  = $('.game')[0].contentWindow.Blockly;
    var xml = Blockly.Xml.workspaceToDom(Blockly.getMainWorkspace());
    var blocks = encodeURIComponent(xml.innerHTML);
    var image = $('.game')[0].contentDocument.getElementById('display').toDataURL('image/png');
    
    $.ajax({
        url:'{{url("question/".$question->id."/submit")}}',
        type: 'POST',
        data: {
            blocks: blocks,
            image: image
        },
        success: function(response) {
            alert(response); // TODO
        }
    });
});

$('#hint').click(function() {
    var confirmed = confirm('Are you sure you want the hint?<br> That will cost you {{$question->hint_penalty * 100}}% of this leve\'s score');
    if (confirmed) {
        $.ajax({
        url:'{{url("question/".$question->id."/hint")}}',
        type: 'GET',
        data: {},
        success: function() {
            alert('{{$question->hint_text}}'); // TODO
        }
    });
    }
});
</script>
@stop