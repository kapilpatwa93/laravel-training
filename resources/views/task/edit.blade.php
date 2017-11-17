
@extends('task.master')
@section('title', 'Edit Task')

@section('content')


    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h2>Edit Task</h2> </div>
            <div class="container">
                <div class="login-container">
                    <div id="output"></div>
                    @if(Session::get('task_update_success'))
                    <div class="alert alert-success">
                        {{Session::get('task_update_success')}}
                    </div>
                    @endif
                    {{dump($errors)}}
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            <div>{{$error}}</div>

                        </div>
                    @endforeach
                    <div class="form-box">

                        <form action="{{route('task.update',[$task->id])}}" method="POST">
                            <div class="form-group">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <label for="formGroupExampleInput">Title</label>
                                
                                {{Form::text('name',$task->name,['class'=>'form-control','id'=>'task_name','placeholder'=>'Name'])}}
                                
                                
                                {{--<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title">--}}
                            </div>
                            <div class="form-group">

                                <label for="formGroupExampleInput2">Description</label>
                                {{--<textarea class="form-control" id="formGroupExampleInput2" placeholder="Description" rows="3"></textarea>--}}
                                {{Form::text('description',$task->description,['class'=>'form-control','rows'=>'3','placeholder'=>'Description'])}}
                            </div>
                            <input type="submit" class="btn btn-success" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection