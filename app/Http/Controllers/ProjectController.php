<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Project;
use App\Rules\IsUser;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $projects = $user->projects()->select('id','title', 'status', 'created_at')->with(['estimate:project_id,start,end', 'invoice:project_id,amount,amount_paid'])->get();

        // return $projects;
        return response()->json($projects, 200);
        
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

        return $this->success("project created", $project, $code = 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $user_id = Auth::id();

        if($project->user_id == $user_id){      
            return $this->success("Projects retrieved", $project, 201);
        }else{
            return $this->error("Project not found", [], 404);
        }
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

        return $this->success("project updated", $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        if($project = Project::find($project)){
            $user = Auth::user();

            if($project->user_id == $user->id){
                $project->delete();
            }

            return $this->SUCCESS("project deleted", null, $code = 204);
        }else{
            return $this->error("project not found");
        }
    }

    public function collaborators(Project $project)
    {
        $user_id = Auth::id();

        if ($user_id == $project->user_id) {
            $team = $project->collaborators ?? [];
            
            // fetch all the team mates as users with profile_picture, name
            $people = array_column($team, "user_id");
            $people = User::whereIn('id', $people)->select('id', 'name', 'profile_picture')->get()->toArray();

            // add profile profile_picture name to main data
            foreach ($people as $key => $person) {

                $person[$key]["designation"] = $team[$key]["designation"];
            }

            return $this->success("collaborators retrieved", $people);        
        }else{
            return $this->error("You are not authorized to view this collaborators",[] , 401);
        }
    }

    public function addCollaborator(Request $request, Project $project) {
        $user_id = Auth::id();

        if ($user_id == $project->user_id) {
            $team = $project->collaborators ?? [];
            $request->validate([
                'user_id' => ['required', 'integer', new IsUser],
                'designation' => 'required|string',
            ]);

            $user = Auth::user();
            // dd($user->subscription);
            $max_collaborators = $user->subscription->subscriptionPlan->features['collaborators'];

            if(count($team) >= $max_collaborators){
                return $this->ERROR("You can only add $max_collaborators collaborators", $code = 412);
            }

            if(in_array($request->user_id, array_column($team, "user_id"))){
                return $this->error("collaborator already exists", []);
            }

            array_push($team, [
                'user_id' => $request->input('user_id'),
                'designation' => $request->input('designation')
            ]);


            $project = $project->update(['collaborators' => $team]);
            // this wont work due to json to array cast
            // $project->collaborators = $team;
            // $project->save();

            return $this->SUCCESS("collaborator added", $project);
        }else{
            return $this->error("Not authorized",[] , 401);
        }
    }

    public function deleteCollaborator(Project $project, $user)
    {
        $user_id = Auth::id();

        if ($user_id == $project->user_id) {
            $collaborators = $project->collaborators ?? [];

            if(in_array($user, array_column($collaborators, "user_id"))){
                           // return "here x";
                $place = array_search($user, array_column($collaborators, "user_id"));

                unset($collaborators[$place]);

                $collaborators = array_values($collaborators);

                $project->update(['collaborators' => $collaborators]);

                return $this->success("collaborator removed", null , 204);

                // return $this->success("collaborator removed", [] , 204);
            }else{
                return $this->error("collaborator not found", [], 404);
            }
        }else{
            return $this->error("Not authorized",[] , 401);
        }

    }


}
