<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Client;
use App\Project;
use App\Estimate;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        // $validation = Validation::clients($data);
        // if(!$validation) return $this->ERROR('Form validation failed', $validation);
        try{
            if(Client::create($data)){
                logger('New client created - ' . $data['name']);
                return $this->SUCCESS('New client created', $data);
            }
            return $this->ERROR('Client creation failed');
        }catch(\Throwable $e){
            return $this->ERROR('Client creation failed', $e);
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $client = Client::find($request->id);
        try{
            if($client){
                // dd($client);
                $client->update($data);
                logger('Client record modified successfully - ' . $client->name);
                return $this->SUCCESS('Client record modified successfully - ' . $client->name);
            }
            return $this->ERROR('No record found for specified client');
        }catch(\Throwable $e){
            return $this->ERROR('Unable to update client', $e);
        }
    }

    public function delete(Request $request){
        if($client = Client::find($request->client_id)){
            $client->delete();
            logger('Client Deleted - ' . $client->name);
            return $this->SUCCESS('Client Deleted - ' . $client->name);
        }
        return $this->ERROR('Client creation failed');
    }

    public function list(){
        $user = Auth::user();
        $clients = $user->clients()->select('id','name','contacts','profile_picture')->with('project:title,status')->paginate(10);

        // $user = User::find(1);
        // return $users->projects()->clients()->;
        
        // $client = Client::where('user_id', Auth::user()->id)->paginate(10);
        return $clients !== null ? $this->SUCCESS('Client retrieved', $clients) : $this->SUCCESS('No client found');
    }

    public function view($client_id){
        $client = Client::where(['id'=>$client_id, 'user_id' => Auth::user()->id])->first();
        return $client !== null ? $this->SUCCESS('Client retrieved', $client) : $this->SUCCESS('No client found');
    }
}
