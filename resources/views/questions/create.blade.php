@extends('app')

@section('content')
    <div class="container">
        <form class="form-horizontal col-md-6" enctype="multipart/form-data" method="post" action="{{route('Question::store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon" >Level</span>
                        <select type="text" class="form-control" name="level" id="level"  placeholder="Enter the Level">
                            @foreach($levels as $level)
                            <option  value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon" >Name</span>
                        <input type="text" required class="form-control" name="name" id="name"  placeholder="Enter the Name"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >Link</span>
                        <input type="text" class="form-control" name="link" id="link"  placeholder="Enter the Link"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >Blocks</span>
                        <input type="text" class="form-control" name="blocks" id="blocks"  placeholder="Enter Blocks"/>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">description</span>
                        <textarea class="form-control" rows="5" name="description" placeholder="Enter the description" ></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >image</span>
                        <input type="file" required name="img" id="img" style="margin-left:10px">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" >Activate Question</span>
                        <input type="checkbox" name="active" value="yes" checked id="chb"><br>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="cols-sm-10">
                </div>
            </div>
                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" >hint text</span>
                            <input type="text" class="form-control" name="hinttext" id="hinttext"  placeholder="Enter hint text"/>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" >hint penalty</span>
                            <input type="text" class="form-control" name="hinttext" id="hinttext"  placeholder="Enter hint text"/>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" >hint image</span>
                            <input type="file" name="hintimg" id="hintimg" style="margin-left:10px">
                        </div>
                    </div>
            </div>


            <div class="form-group  ">
                <button  type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
            </div>

        </form>
    </div>
@stop
