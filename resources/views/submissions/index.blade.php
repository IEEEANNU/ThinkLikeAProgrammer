@extends('app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12" >
        <div class="">
            <h1>Submissions for Question #{{$question->id}}: {{ $question->name }}</h1>
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="20%">User</th>
                    <th width="20%">Email</th>
                    <th width="10%">Score</th>
                    <th width="30%">Last Assessed</th>
                    <th width="10%">View</th>
                    <th width="10%">Assessments</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                      <tr>
                          <td>{{$submission->user->name}}</td>
                          <td>{{$submission->user->email}}</td>
                          <td>{{round($submission->score,3)}}</td>
                          <?php $lastAssessment = $submission->assessments()
                            ->orderBy('created_at', 'desc')->first(); ?>
                          @if (!empty($lastAssessment))
                          <td>{{\Carbon\Carbon::parse($lastAssessment->created_at)->toDayDateTimeString()}}</td>
                          @else
                          <td> Never </td>
                          @endif
                          <td><a class="btn btn-danger" href="{{route('Submission::show', ['questionId' => $question->id, 'id' => $submission->id])}}">View Submission<a></td>
                          <td><a class="btn btn-danger" href="{{route('Assessment::index', ['questionId' => $question->id, 'submissionId' => $submission->id])}}">View Assessments<a></td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <hr>
        </div>
    </div>
</div>
</div>
@stop
