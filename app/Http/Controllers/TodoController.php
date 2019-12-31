<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){
		return view("home");
    }
    public function getTask(){
        $tasks = Todo::orderBy("id", "DEC")->get();
        $html = view("task")->with('tasks', $tasks)->render();
        return response()->json(['response'=> $html,"count"=> count($tasks)]);
    }
	public function store(Request $request)
	{
		$input = $request->all();
		$task = new Todo();
		$task->task = request("task");
		$task->save();
        return response()->json(["message"=>"Task has been added"]);
	}
	public function complete(Request $request, $id)
	{
		$task = Todo::find($id);
		$task->iscompleted = request("iscompleted");
        $task->save();
        return response()->json(["message"=>"Task has been updated"]);
	}
	public function destroy(Request $request)
	{
        $checked = $request->input('checked',[]);
        Todo::whereIn("id",$checked)->delete(); 
        return response()->json(["msg"=> "Task has ben deleted"]);
	}
}
