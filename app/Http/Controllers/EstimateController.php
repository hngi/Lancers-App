<?php

namespace App\Http\Controllers;

use App\Estimate;
use Illuminate\Http\Request;
use App\Http\Resources\Estimate as EstimateResource;
use App\Http\Resources\EstimateCollection;
use Illuminate\Support\Facades\Auth;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $estimate = Estimate::where('project_id', $project->id)->first();
        if($estimate){
            return $this->SUCCESS($estimate);
        }
        return $this->ERROR('Estimate not Found');
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
            'project_id' => 'required|numeric',
            'time' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'equipment_cost' => 'nullable|numeric',
            'sub_contractors' => 'nullable|string',
            'sub_contractors_cost' => 'nullable|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $estimateCost = $request->input('price_per_hour') * $request->input('time');

        $estimate = Estimate::create($request->all() + ['estimate' => $estimateCost]);

        if ($estimate) {
            return $this->SUCCESS($estimate);
        }

        return $this->ERROR('Estimate creation failed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'time' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'equipment_cost' => 'nullable|numeric',
            'sub_contractors' => 'nullable|string',
            'sub_contractors_cost' => 'nullable|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $estimate = Estimate::where('project_id', $request->input('project_id'))->first();

        if ($estimate) {
            $estimateCost = $request->input('price_per_hour') * $request->input('time');
            $estimate->update($request->all() + ['estimate' => $estimateCost]);
            return $this->SUCCESS($estimate);
        }

        return $this->ERROR('Estimate not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        if($estimate = Estimate::find($estimate->id)){
            $estimate->delete();
            return $this->SUCCESS('Estimate Deleted');
        }
        return $this->ERROR('Estimate deletion failed');
    }
}
