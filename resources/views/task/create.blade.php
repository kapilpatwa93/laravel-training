
@extends('task.master')
    @section('title', 'Create Todo')

@section('content')

   
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading text-center">Create a ToDo</div>
          <div class="container">
                <div class="login-container">
                        <div id="output"></div>
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <div class="form-box">
                        <form action="{{route('task.store')}}" method="post">
                            {{csrf_field()}}
                          <div class="form-group">
                            <label for="task_name">Name</label>
                            <input type="text" class="form-control" name="name" id="task_name" placeholder="Name">
                          </div>
                          <div class="form-group">
                            
                            <label for="formGroupExampleInput2">Description</label>
                            <textarea class="form-control" id="task_description" name="description" placeholder="Description" rows="3"></textarea>
                          </div>
                            <input type="submit" class="btn btn-success" value="Create"/>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
      </div>
    

@endsection