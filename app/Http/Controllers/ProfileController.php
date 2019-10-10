<?php
/**
 * @author Mofehintolu MUMUNI
 * 
 * @description ProfileController  Controller that handles user Profile
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    
    /**
     * 
     * @param Request $request
     * 
     * 
     * 
     */
    function editProfile(Request $request)
    {
      //check user provided input
      $checkNameInput = $this->validator(["name"=> $request->input('name')]);
      if(!$checkNameInput->fails())
      {
            //get user details
            
            $userDetails = auth()->user();
            $userDetails->name = $request->input('name');
            $userDetails->save();

            return redirect('dashboard')->with(['editStatus'=>'Profile name changed succesfully to ', 'newName'=> $userDetails->name]);

            
      }
      else
      {
          $errorsArray = $checkNameInput->errors()->all();
          $errorString = '';

          //pass in a ponter of the $errorString  
          array_map(function($value)use(&$errorString)
          {
            $errorString .= $value;
          },$errorsArray);

        return redirect('dashboard')->with('editErrors',$errorString);

      }

    }
}
