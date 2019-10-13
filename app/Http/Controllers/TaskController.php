<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Project;
use App\Rules\IsUser;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->get();
        if($tasks){
            return $this->SUCCESS("tasks retrieved", $tasks);
        }
        return $this->ERROR('no Task Found');
    }

    
    public function show(Task $task)
    {
        if($task){
            return $this->SUCCESS($task);
        }
        return $this->ERROR('Task not Found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'progress' => 'nullable|numeric',
            'team' => 'nullable|string',
            'due_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'project_id' => 'required|numeric',
            'status' => 'nullable|string'
        ]);

        $task = Task::create($request->all());

        if ($task) {
            return $this->SUCCESS("task created", $task);
        }

        return $this->ERROR('Task creation failed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string',
            'progress' => 'nullable|numeric',
            'team' => 'nullable|string',
            'due_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'project_id' => 'required|numeric',
            'status' => 'nullable|string'
        ]);

        $task = Task::where('project_id', $request->input('project_id'))->first();

        if ($task) {
            $task->update($request->all());
            return $this->SUCCESS("task updated",$task);
        }

        return $this->ERROR('Task not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if($task = Task::find($task->id)){
            $task->delete();
            return $this->SUCCESS('Task Deleted');
        }
        return $this->ERROR('Task deletion failed');
    }

    public function addTeam(Task $task, Request $request) {
        $team = $task->team ?? [];
        $request->validate([
            'user_id' => ['required', 'integer', new IsUser],
            'designation' => 'required|string',
        ]);

        array_push($team, [
            'user_id' => $request->input('user_id'),
            'designation' => $request->input('designation')
        ]);


        $task = $task->update(['team' => $team]);

        return $this->SUCCESS("team added", $task);
    }

    public function team(Task $task)
    {
        $team = $task->team ?? [];
        
        // fetch all the team mates as users with profile_picture, name
        $members_id = array_column($team, "user_id");
        $members = User::whereIn('id', $members_id)->select('id', 'name', 'profile_picture')->get();

        // add profile profile_picture name to main data
        foreach ($members as $key => $person) {
            $members[$key]["designation"] = $team[$key]["designation"];
        }

        return $this->SUCCESS("members retrieved", $members);
    }
}