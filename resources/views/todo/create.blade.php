
@extends('todo.master')
    @section('title', 'Create Todo')

@section('content')

   
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading text-center">Create a ToDo</div>
          <div class="container">
                <div class="login-container">
                        <div id="output"></div>
                    <div class="form-box">
                        <form>
                          <div class="form-group">
                            <label for="formGroupExampleInput">Title</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title">
                          </div>
                          <div class="form-group">
                            
                            <label for="formGroupExampleInput2">Description</label>
                            <textarea class="form-control" id="formGroupExampleInput2" placeholder="Description" rows="3"></textarea> 
                          </div>
                            <button type="button" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
      </div>
    

@endsection