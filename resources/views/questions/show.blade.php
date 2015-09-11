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
    <div class="col-md-1 col-md-offset-8">
        <button id="hint" class="btn btn-success">Hint</button>
    </div>
    <div class="col-md-1">
        <button id="submit" class="btn btn-danger">Submit</button>
    </div>
</div>
<iframe class="game" src="{{url('/game/apps/turtle/index.html')}}" width="95%" height="655" sandbox="allow-same-origin allow-scripts"></iframe>
@stop

@section('scripts')
<script type="text/javascript">

</script>
@stop