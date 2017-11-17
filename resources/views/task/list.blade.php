@extends('task.master')
    @section('title', 'View Todo')

@section('content')

 
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading text-center"></div>
        @if(Session::get('task_delete_success'))
            <div class="alert alert-success">{{Session::get('task_delete_success')}}  </div>
        @endif
        <div></div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
              <tr>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td>
                <a class="btn" href="{{route('task.edit',[$task->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="btn" href="{{route('task.delete',[$task->id])}}"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
              </tr>
              @endforeach
            @if(count($tasks) ==0)
              <tr>
                <td colspan="3" align="center">No tasks found</td>
              </tr>
              @endif
              {{--<tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                </td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </td>
              </tr>--}}

            </tbody>
          </table>
      </div>
    </div>
  

@endsection