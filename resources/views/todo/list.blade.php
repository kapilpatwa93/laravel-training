@extends('todo.master')
    @section('title', 'View Todo')

@section('content')

 
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading text-center"></div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                </td>
              </tr>
              <tr>
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
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  

@endsection