@extends('app')

@section('content')
    <div class="container">
        <form class="form-horizontal col-md-6" enctype="multipart/form-data" method="post" action="{{URL("level/store")}}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon" >Level Name</span>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter the Level Name"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >Mark</span>
                        <input type="text" required class="form-control" name="mark" id="mark"  placeholder="Enter the Mark"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >Activate Question</span>
                        <input type="checkbox" name="active" value="yes" checked id="chb"><br>
                    </div>

                    </div>
                </div>


            <div class="form-group  ">
                <button  type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
            </div>

        </form>
    </div>
@stop
