<?php

namespace App\Http\Controllers;

use App\Estimate;
use Illuminate\Http\Request;
use App\Http\Resources\Estimate as EstimateResource;
use App\Http\Resources\EstimateCollection;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'all estimates',
            'data' => new EstimateCollection(Estimate::all())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'equipment_cost' => 'required|numeric',
            'sub_contractors' => 'required|string',
            'sub_contractors_cost' => 'required|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $estimate = Estimate::create([
            'project_id' => $request->project_id,
            'time' => $request->time,
            'price_per_hour' => $request->price_per_hour,
            'equipment_cost' => $request->equipment_cost,
            'sub_contractors' => $request->sub_contractors,
            'sub_contractors_cost' => $request->sub_contractors_cost,
            'similar_projects' => $request->similar_projects,
            'rating' => $request->rating,
            'currency_id' => $request->currency_id,
            'start' => $request->start,
            'end' => $request->end
        ]);

        if ($estimate) {
            return response()->json([
                'message' => 'estimate stored',
                'data' => new EstimateResource($estimate)
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        return response()->json([
            'message' => 'estimate found',
            'data' => new EstimateResource($estimate)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'equipment_cost' => 'required|numeric',
            'sub_contractors' => 'required|string',
            'sub_contractors_cost' => 'required|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);


        $estimate->update([
            'project_id' => $request->project_id,
            'time' => $request->time,
            'price_per_hour' => $request->price_per_hour,
            'equipment_cost' => $request->equipment_cost,
            'sub_contractors' => $request->sub_contractors,
            'sub_contractors_cost' => $request->sub_contractors_cost,
            'similar_projects' => $request->similar_projects,
            'rating' => $request->rating,
            'currency_id' => $request->currency_id,
            'start' => $request->start,
            'end' => $request->end
        ]);

        if ($estimate) {
            return response()->json([
                'message' => 'estimate updated',
                'data' => new EstimateResource($estimate)
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        $estimate->delete();

        return response()->json([
            'message' => 'estimate deleted',
        ], 200);
    }
}
