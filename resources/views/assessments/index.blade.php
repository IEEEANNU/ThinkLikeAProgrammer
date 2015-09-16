@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-default" href="{{route('Submission::show', ['questionId' => $question->id, 'id' => $submission->id])}}">&#8592; Back to submission</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10" >
            <div class="">
                <h1>Assessments for Submission.</h1>
                <h3>submitted by user {{$submission->user->name}}, {{$submission->user->email}}</h3>
                <h3>Question #{{$question->id}}: {{ $question->name }}</h3>
                <p>Final Submission Grade {{round($submission->score, 5)}}</p>
                @if(!empty($assessments))
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="30%">Grader</th>
                                <th width="20%">Grade</th>
                                <th width="20%">Score</th>
                                <th width="30%">Assessed at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assessments as $assessment)
                            <tr>
                                <td>{{$assessment->grader->name}}</td>
                                <td>{{round($assessment->grade,5)*100.0}}%</td>
                                <td>{{round($assessment->final_grade,5)}}</td>
                                <td>{{\Carbon\Carbon::parse($assessment->created_at)->toDayDateTimeString()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                No Assessments
                @endif
                <hr>
            </div>
        </div>
    </div>
</div>
@stop
