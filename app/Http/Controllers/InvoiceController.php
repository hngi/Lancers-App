<?php

namespace App\Http\Controllers;

use Auth;
use App\Invoice;
use Illuminate\Http\Request;
use App\Client;

class InvoiceController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Creates new record in the invoice table
     */
    public function store(Request $request){
        $data = $request->all();
        // $validation = Validation::invoice($data);
        // if(!$validation) return $this->ERROR('Form validation failed', $validation);

        try{
            if(Invoice::create($data)){
                logger('New Invoice created');
                return $this->SUCCESS('New Invoice created');
            }
            return $this->ERROR('Invoice creation failed');
        }catch(\Throwable $e){
            return $this->ERROR('Invoice creation failed', $e);
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $invoice = Invoice::where('project_id', $data['project_id'])->first();
        try{
            if($invoice){
                $invoice->update($data);
                logger('Invoice record modified successfully');
                return $this->SUCCESS('Invoice record modified successfully');
            }
            return $this->ERROR('No record found for specified invoice');
        }catch(\Throwable $e){
            return $this->ERROR('Invoice modification failed', $e);
        }
    }

    public function delete(Request $request){
        if($invoice = Invoice::find($request->client_id)){
            $invoice->delete();
            logger('Invoice Deleted - ' . $invoice->name);
            return $this->SUCCESS('Invoice Deleted - ' . $invoice->name);
        }
        return $this->ERROR('Invoice deletion failed');
    }

    public function list(){
        $result = [];
        $projects = Auth::user()->projects;
        if($projects->count() > 0){
            foreach($projects as $project){
                if($project->invoice !== null)
                {
                    $project['client_name']= Client::find($project['client_id'])['name'];

                 array_push($result, $project);

                }
            }
        }


    count($result) > 0 ? $this->SUCCESS('Invoice retrieved', $projects) : $this->SUCCESS('No invoice found');


     return view("invoice_list_view")->with(['projects'=>$result]);
    }

    public function view($invoice_id){
        $invoice = Invoice::where(['id'=>$invoice_id, 'project_id' => Auth::user()->id])->first();
        return $invoice->count() > 0 ? $this->SUCCESS('Invoice retrieved', $invoice) : $this->SUCCESS('No invoice found');
    }
}
