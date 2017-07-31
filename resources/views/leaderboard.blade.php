@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10" >
            <div class="">
                <h1>All Users</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">Rank</th>
                                <th width="30%">Name</th>
                               @can('grader',null) <th width="35%">Email</th>@endcan
                                <th width="30%">Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $i => $user)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$user->name}}</td>
                                @can('grader',null);
                                <td>{{$user->email}}</td>
                                @endcan
                                <td>{{round($user->total_score,5)}}</td>
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
