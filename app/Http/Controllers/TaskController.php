<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
            $tasks = Task::where('user_id','=',Auth::user()->id)->get();

            return view('task.list',['tasks'=>$tasks]);

        }catch(\Exception $ex){
            return back()->withErrors(['general_error'=>'Something Went Wrong!!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            return view('task.create');
        }catch(\Exception $ex){
            return back();//->withErrors(['general_error'=>'Something Went Wrong!!']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validator = \Validator::make($request->all(),[
                'name'=>'required|max:255',
                'description'=>'required'
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->errors());
            }
            $task = new Task();
            $task->name = $request->name;
            $task->user_id = Auth::user()->id;
            $task->description = $request->description;

            if($task->save()){

                return response()->redirectToRoute('task.index')->with(['task_success'=>'Task added successfully']);
            }else{

                return back()->withErrors(['task_error'=>'Cannot add task please try again']);

            }
        }catch(\Exception $ex){
            
            return back()->withErrors(['general_error'=>'Something Went Wrong!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $task = Task::findOrFail($id);
            return view('task.edit',['task'=>$task]);

        }catch(\Exception $ex){
           
            return back()->withErrors(['task_find_error','Something went wrong!!']);
        }
        //
    }

    public function delete($id)
    {
        try{
            $task = Task::findOrFail($id);
            if($task->delete()){
                return response()->redirectToRoute('task.index')->with(['task_delete_success'=>'Task deleted successfully']);
            }else{
                return back()->withErrors(['task_delete_error'=>"Cannot delete task.Please try again"]);
            }
        }catch(\Exception $ex){
            return back()->withErrors(['general_error'=>'Something Went Wrong!!']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $task = Task::find($id);
            if(!$task){
                return back()->withErrors(['task_find_error'=>'Cannot find task!']);
            }
            return view('task.edit',['task'=>$task]);

        }catch(\Exception $ex){
           
            return back()->withErrors(['general_error'=>'Something went wrong!!!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $validator = \Validator::make($request->all(),[
                'name'=>'required|max:255',
                'description'=>'required'
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->errors());
            }

            $task = Task::where('id','=',$id)
                        ->update(['name'=>$request->name,'description'=>$request->description]);

            $request->session()->flash('task_update_success','Task updated successfully');
            return back()->with(['task'=>$task]);


        } catch (\Exception $e) {

            return back();//->withErrors(['general_error'=>'Something Went Wrong!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
