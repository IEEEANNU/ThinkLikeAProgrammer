@extends('app')

@section('content')
<hr>
<div class="row">

    <div class="col-lg-8 col-lg-offset-1" >
      <hr>
      <p>Welcome {{\Auth::user()->name}}
      <br>
      <a href="{{url('logout')}}">log out</a>
      <hr>
        <div class="">
            @forelse($levels as $level)
            <h3>{{ $level->name }}, Question Score: {{$level->mark}}</h3>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Question Name</th>
                    @if(false)
                    <th>Your Score</th>
                    @endif
                    <th>Last Submitted</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($level->questions as $question)
                    <?php
                      $Qsubmissions = \App\Submission::where('question_id','=',$question->id);

                      $sorted = $collection->sortBy(function ($sth, $key) {
                          return $sth['create_at'];
                      });

                    ?>
                      <tr>
                          <td><a href="{{url('question', [$question->id])}}">{{$question->name}}</a></td>
                          @if(false)
                          <td>0</td>
                          @endif
                          <td>{{$sorted[0]}}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            @empty
            <h1>Competition Has not yet started</h1>
            @endforelse
        </div>
    </div>
    @if(false)
    <div class=" col-lg-2 col-lg-offset-0 well">
        <div class="row">
            <center><label style="font-size:21px; color:#19a2e4;">Leaderboard</label></center>
            <hr>
        </div>
        <div class="row">
            @foreach($leaders->take(3) as $i => $leader)
            <div class="" style="height:25px;">
                {{$i+1}}.<span>{{$leader->name}}</span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="10" aria-valuemax="100" style="width:{{$leader->total_score *100 / $maxScore}}%">
                        <span id="topscore{{$leader->id}}">{{$leader->total_score}}</span>
                    </div>
                </div>
            </div>
            <br>
            @endforeach

            <div class=""><hr></div>
            <div class="row">
                <center><label style="font-size:17px; color:#19a2e4;">You are #<span>{{$myRank}}</span></label></center>
            </div>
            <div class="" style="height:25px;">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$myTotalScore *100 / $maxScore}}%">
                        <span data-width="{{$myTotalScore}}">{{$myTotalScore}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endif
</div>
@stop
