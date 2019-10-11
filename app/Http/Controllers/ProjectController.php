<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');          
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $projects = $user->projects()->select('id','title', 'status', 'created_at')->with(['estimate:project_id,start,end', 'invoice:project_id,amount,amount_paid'])->get();

        return $projects;
    }

    public function create()
    {
        return view('createproject');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $user = Auth::user();

        $data = [
            'title' => $request->title,
            'tracking_code' => Project::generateTrackingCode()
        ];

        if(isset($request->description)){
            $data['description'] = $request->description;
        }

        $project = $user->projects()->create($data);

        return $project;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'progress' => 'nullable|numeric',
            'status' => 'nullable|in:pending,in-progress,completed'
        ]);

        if(isset($request->title)){
            $project->title = $request->title;
        }

        if(isset($request->description)){
            $project->description = $request->description;
        }

        if(isset($request->progress)){
            $project->progress = $request->progress;
        }

        if(isset($request->status)){
            $project->status = $request->status;
        }

        $project->save();

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $user = Auth::user();

        if($project->user_id == $user->id){
            $project->delete();
        }

        return $project;
    }

    public function collaborators(Project $project)
    {
        $team = $project->collaborators ?? [];
        
        // fetch all the team mates as users with profile_picture, name
        $people = array_column($team, "user_id");
        $people = User::whereIn('id', $people)->select('id', 'name', 'profile_picture')->get();

        // add profile profile_picture name to main data
        foreach ($people as $key => $person) {
            $person[$key]["designation"] = $team[$key]["designation"];
        }

        return $people;
    }
}
