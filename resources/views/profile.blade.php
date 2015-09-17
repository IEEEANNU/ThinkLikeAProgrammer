@extends('app')

@section('content')
<div class="container">
<div class="row">

    <div class="col-md-8" >
        <div class="">
            @forelse($levels as $level)
            <h3>{{ $level->name }}</h3>
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="40%">Question Name</th>
                    <th width="20%">Question Score</th>
                    @can('grade', $level)
                    <th width="40%">Submissions</th>
                    @else
                    <th width="40%">Last Submitted</th>
                    @endcan
                  </tr>
                </thead>
                <tbody>
                    @foreach($level->questions as $question)
                    @if($question->active || \Auth::user()->can('grade', $question))
                      <tr>
                          <td><a href="{{url('question', [$question->id])}}">{{$question->name}}</a></td>
                          <td>{{round($level->mark,1)}}</td>
                          @can('grade', $level)
                          <td><a class="btn btn-danger" href="{{route('Submission::index', ['questionId' => $question->id])}}">View Submissions</a></td>
                          @else
                          <?php $lastSub = $question->submissions()
                            ->where('user_id', '=', Auth::user()->id)
                            ->orderBy('created_at', 'desc')->first(); ?>
                          @if (!empty($lastSub))
                          <td>{{\Carbon\Carbon::parse($lastSub->created_at)->toDayDateTimeString()}}</td>
                          @else
                          <td> Never </td>
                          @endif
                          @endcan
                      </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            </div>
            <hr>
            @empty
            <h1>Competition Has not yet started</h1>
            @endforelse
        </div>
    </div>
    @can('grade', null)
    <div class=" col-md-2 well">
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
                        <span id="topscore{{$leader->id}}">{{round($leader->total_score, 5)}}</span>
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
                        <span data-width="{{$myTotalScore}}">{{round($myTotalScore,5)}}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1"><a class="btn btn-success" href="{{url('leaderboard')}}" width="100%">Full Leaderboard</a></div>            
            </div>
        </div>
    </div>
    @endcan
</div>
</div>
@stop
