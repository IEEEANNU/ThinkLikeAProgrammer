@extends('app')

@section('content')
    <div class="container">
        <table class="table" style="width:50%; margin:0 auto">
            @if(count($errors)>0)
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                </tr>
            @endif
        </table>
        <form class="form-horizontal col-md-6" enctype="multipart/form-data" method="post" action="{{URL('upload')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon" >image</span>
                        <input type="file" name="file" id="file" style="margin-left:10px">
                    </div>
                </div>
            </div>




            <div class="form-group  ">
                <button  type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
            </div>

        </form>
    </div>
@stop
