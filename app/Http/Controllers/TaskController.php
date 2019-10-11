<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Create, Get, Update and Delete Tasks

    public function getAllTasks() {
        $tasks = Task::get()->toJson(JSON_PRETTY_PRINT);
        return response($tasks, 200);
    }

    public function createTask(Request $request) {

        $task = new Task;
        $task->name = $request->name;
        $task->progress = $request->progress;
        $task->team = $request->team;
        $task->due_date = $request->due_date;
        $task->start_date = $request->start_date;
        $task->project_id = $request->project_id;
        $task->status = $request->status;
        $task->created_at = $request->created_at;
        $task->updated_at = $request->updated_at;
        $task->save();
    
        return response()->json([
            "message" => "task created"
        ], 201);
    }

    public function getTask($id) {
        if (Task::where('id', $id)->exists()) {
            $task = Task::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($task, 200);
          } else {
            return response()->json([
              "message" => "Task not found"
            ], 404);
          }

    }

    public function updateTask(Request $request, $id) {
        if (Task::where('id', $id)->exists()) {
            $task = Task::find($id);
            $task->name = is_null($request->name) ? $task->name : $request->name;
            $task->progress = is_null($request->progress) ? $task->progress : $request->progress;
            $task->team = is_null($request->team) ? $task->team : $request->team;
            $task->due_date = is_null($request->due_date) ? $task->due_date : $request->due_date;
            $task->start_date = is_null($request->start_date) ? $task->start_date : $request->start_date;
            $task->project_id = is_null($request->project_id) ? $task->project_id : $request->project_id;
            $task->status = is_null($request->status) ? $task->status : $request->status;
            $task->updated_at = is_null($request->updated_at) ? $task->updated_at : $request->updated_at;
            $student->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Task not found"
            ], 404);
            
        }

    }

    public function deleteTask($id) {
    if(Task::where('id', $id)->exists()) {
        $task = Task::find($id);
        $task->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Task not found"
        ], 404);
      }
    }

    public function projectTasks(Project $project)
    {
        $tasks = $project->tasks()->select('id', 'name', 'created_at', 'status', 'team')->get();

        $tasks->each(function($task, $key){

            $people = User::whereIn('id', array_column($task->team ?? [], "user_id"))->select('name', 'profile_picture')->get()->toArray();

            $task->team = $people;
        });

        return $tasks;
    }

    public function addCollaborators(Request $request, Task $task)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'designation' => 'nullable|string'
        ]);

        $data = [
            'user_id' => $request->user_id
        ];

        if(isset($request->designation)){
            $data['designation'] = $request->designation;
        }

        $team = $task->team ?? [];

        $team[] = $data;

        $task = $task->update(['team' => $team]);

        return $task;

    }
}