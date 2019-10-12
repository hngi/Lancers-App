<?php
/**
 * @author Mofehintolu MUMUNI
 *
 * @description ProfileController  Controller that handles user Profile
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\State;
use App\Profile;
use App\Currency;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    /**
     * show user profile details
     */
    function index()
    {
        $user = Auth::user();
        //get country id
        //get state id
        //get currency id
        $countryValue = Country::all()->toArray();
        $currencyValue = Currency::all()->toArray();
        $stateValue = State::all()->toArray();

        //Get user profile details
        $userProfile =  $user->profile;

        //check if collection is null similar to mysqli num ros
        if($userProfile != null)
        {
            if((sizeof($userProfile->toArray()) > 0))
            {
                $detials = $userProfile->toArray();

                $country = Country::where('id',$detials['country_id'])->first()->toArray()['name'];
                $currency = Currency::where('id',$detials['currency_id'])->first()->toArray()['name'];
                $state = State::where('id',$detials['state_id'])->first()->toArray()['name'];

                //change values in array

                $detials['country_id'] = $country;
                $detials['currency_id'] = $currency;
                $detials['state_id'] = $state;

                return view('profile',['data' => [$countryValue,$currencyValue,$stateValue,$detials]]);
            }
            else
            {
                return view('profile',['data' => [$countryValue,$currencyValue,$stateValue,null]]);
            }
        }
        else
        {
            return view('profile',['data' => [$countryValue,$currencyValue,$stateValue,null]]);
        }




    }

    /**
     * show user profile details
     */

    function userProfileDetails()
    {

        //Get user profile details
        $userProfile = Profile::where('user_id',auth()->user()->id)->first();

        //check if collection is null similar to mysqli num ros
        if($userProfile != null)
        {
            if((sizeof($userProfile->toArray()) > 0) && ($userProfile->toArray()['first_name'] != 'none'))
            {
                $detials = $userProfile->toArray();

                $country = Country::where('id',$detials['country_id'])->first()->toArray()['name'];
                $currency = Currency::where('id',$detials['currency_id'])->first()->toArray()['name'];
                $state = State::where('id',$detials['state_id'])->first()->toArray()['name'];

                //change values in array

                $detials['country_id'] = $country;
                $detials['currency_id'] = $currency;
                $detials['state_id'] = $state;

                return view('user_profile',['data' => [$detials]]);
            }
            else
            {
                return view('user_profile',['data' => [$userProfile->toArray()]]);
            }
        }
        else
        {
            return view('user_profile',['data' => [null]]);
        }


    }



    protected function validatorId(array $data)
    {
        return Validator::make($data, [
            'id' => ['required', 'string', 'max:255'],
                ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'title' => ['required', 'string', 'max:255'],
        'company_name' => ['required', 'string', 'max:255'],
        'company_email' => ['required', 'email', 'max:255'],
        'company_address' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'numeric'],
        'street' => ['required', 'string', 'max:255'],
        'street' => ['required', 'string', 'max:255'],
        'street_number' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'zipcode' => ['required', 'string', 'max:255'],
        'contacts' => ['required', 'string', 'max:255'],
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
      $validateAll = $this->validator($request->all());
      $countryIdVal = $this->validatorId(['id'=> $request->input('country_id')]);
      $currencyIdVal = $this->validatorId(['id'=> $request->input('currency_id')]);
      $stateIdVal = $this->validatorId(['id'=> $request->input('state_id')]);



        if((!$validateAll->fails()) && (!$countryIdVal->fails()) && (!$currencyIdVal->fails()) && (!$stateIdVal->fails()))
      {
            //get user details

            $userDetails = auth()->user();
            $userDetails->name = $request->input('first_name').' '.$request->input('last_name');
            $userDetails->save();

            $FullNameSave = false;

            ($userDetails) ? $FullNameSave = true : $FullNameSave = false;

            //handle main profile save
            if($FullNameSave)
            {
                //check if usr has saved data before
                $userProfileData = User::where('id',auth()->user()->toArray()['id'])->find(1)->profile()->get();

                if($userProfileData)
                {
                    //cast collection result to array
                    $collectionResult = $userProfileData->toArray();

                    if(sizeof($collectionResult) != 0)
                    {

                    $userProfile = Profile::where('user_id',auth()->user()->id)->first();

                    $userProfile->first_name = $request->input('first_name');
                    $userProfile->last_name = $request->input('last_name');
                    $userProfile->title = $request->input('title');
                    $userProfile->company_name = $request->input('company_name');
                    $userProfile->company_email = $request->input('company_email');
                    $userProfile->company_address = $request->input('company_address');
                    $userProfile->phone = $request->input('phone');
                    $userProfile->street = $request->input('street');
                    $userProfile->street_number = $request->input('street_number');
                    $userProfile->country_id = $request->input('country_id');
                    $userProfile->city  = $request->input('city');
                    $userProfile->zipcode = $request->input('zipcode');
                    $userProfile->state_id = $request->input('state_id');
                    $userProfile->timezone = $request->input('timezone');
                    $userProfile->contacts = $request->input('contacts');
                    $userProfile->currency_id = $request->input('currency_id');
                    $userProfile->save();

                    if($userProfile)
                    {
                        return redirect('/dashboard/profile')->with('editStatus','Profile details saved succesfully!');
                    }
                    else
                    {
                        $errorString = ['Profile details not saved, database error'];

                        return redirect('/dashboard/profile')->with('editErrors',$errorString);

                    }

                    }
                    else
                    {
                        //save new data
                        $userProfile = Profile::create([
                            'user_id' => auth()->user()->id,
                            'first_name' => $request->input('first_name'),
                            'last_name' => $request->input('first_name'),
                            'title' => $request->input('first_name'),
                            'profile_picture' => 'null',
                            'company_name' => $request->input('company_name'),
                            'company_email' => $request->input('company_email'),
                            'company_address' => $request->input('company_address'),
                            'phone' => $request->input('phone'),
                            'street' => $request->input('street'),
                            'street_number' => $request->input('street_number'),
                            'country_id' => $request->input('country_id'),
                            'city'  => $request->input('city'),
                            'zipcode' => $request->input('zipcode'),
                            'state_id' => $request->input('state_id'),
                            'timezone' => $request->input('timezone'),
                            'contacts' => $request->input('contacts'),
                            'currency_id' => $request->input('currency_id'),
                                                ]);

                        if($userProfile)
                        {
                            return redirect('/dashboard/profile')->with('editStatus','Profile details saved succesfully!');

                        }
                        else
                        {
                            $errorString[] = 'Profile details not saved, database error';

                            return redirect('/dashboard/profile')->with('editErrors',$errorString);

                        }

                    }

                }
                else{

                    $errorString = ['Profile details not saved, database error'];

                  return redirect('/dashboard/profile')->with('editErrors',$errorString);
                }




            }
            else{

                $errorString = ['Profile details not saved, database error'];

              return redirect('/dashboard/profile')->with('editErrors',$errorString);
            }



      }
      else
      {

          $errorsArray = $validateAll->errors()->all();
          $errorString = [];

          //pass in a ponter of the $errorString
          array_map(function($value)use(&$errorString)
          {
            $errorString[] = $value;
          },$errorsArray);


      if((!$countryIdVal->fails()))
      {
        $errorString[] = 'Country not selected';
      }

      if((!$currencyIdVal->fails()))
      {
        $errorString[] = 'Currency not selected';
      }


      if((!$stateIdVal->fails()))
      {


       $errorString[] = 'State not selected';

      }


        return redirect('/dashboard/profile')->with('editErrors',$errorString);

      }

    }


    function ImageValidation(array $array)
    {
        return Validator::make($array, [
            'profileimage'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }

    /**
     * @description receive user upload photo and update picture
     * @param Request $request
     *
     */
    function updateImage(Request $request)
    {
        $imageValidate = $this->ImageValidation(['profileimage' => $request->file('profileimage')]);
        if(!$imageValidate->fails())
        {
          //check if user has image
          $userProfileData = User::where('id',auth()->user()->toArray()['id'])->find(1)->profile()->get();

          if($userProfileData)
          {
              //cast collection result to array
              $collectionResult = $userProfileData->toArray();

              if(sizeof($collectionResult) != 0)
              {  //upload image and update image field only

                  //get profile image
                    $oldImage = $collectionResult[0]['profile_picture'];

                    if($oldImage != "null")
                    {
                        // check if user has image and unlink
                        if(file_exists(public_path($oldImage)))
                        {
                            unlink(public_path($oldImage));
                        }

                    }


                    $imagePathString = $this->uploadImageToFile($request->file('profileimage'));
                    //store in DB
                    $userProfile = Profile::where('user_id',auth()->user()->id)->first();
                    $userProfile->profile_picture = $imagePathString;
                    $userProfile->save();
                    if($userProfile)
                    {
                        return redirect('/dashboard/profile')->with(['ImageUploadMessage' => 'User Image Uploaded succesfully']);

                    }
                    else
                    {
                        if(file_exists(public_path($imagePathString)))
                        {
                            unlink(public_path($imagePathString));
                        }
                        return redirect('/dashboard/profile')->with(['ImageUploadMessage' => 'User Image not uploaded succesfully, database error!']);

                    }
             }
              else{
                  //upload image and insert new image and add null for other fileds
                  $imagePathString = $this->uploadImageToFile($request->file('profileimage'));
                  $userProfile = Profile::create([
                    'user_id' => auth()->user()->id,
                    'first_name' => 'none',
                    'last_name' => 'none',
                    'title' => 'none',
                    'profile_picture' => $imagePathString,
                    'company_name' => 'none',
                    'company_email' => 'none',
                    'company_address' => 'none',
                    'phone' => 'none',
                    'street' => 'none',
                    'street_number' => 'none',
                    'country_id' => 0,
                    'city'  => 'none',
                    'zipcode' => 'none',
                    'state_id' => 0,
                    'timezone' => 'none',
                    'contacts' => 'none',
                    'currency_id' => 0,
                                        ]);


                  return redirect('/dashboard/profile')->with(['ImageUploadMessage' => 'User Image updated succesfully']);

              }

          }
          else
          {
            return redirect('/dashboard/profile')->with(['ImageUploadMessage' => 'User Image not uploaded succesfully, database error!']);
          }


        }
        else{
            $errorString = [];
            if($imageValidate->fails())
            {
                $errorsArrayImage = $imageValidate->errors()->all();
                //pass in a ponter of the $errorString
                array_map(function($value)use(&$errorString)
                {
                    $errorString[] = $value;
                },$errorsArrayImage);

            }
            return redirect('/dashboard/profile')->with(['ImageUploadMessage' => 'User Image not uploaded succesfully']);

        }
    }




    public function uploadImageToFile(UploadedFile $uploadedFile,  $Imagefilename = null, $folderName = null, $appDiskStorage = null)
    {
        $folderName = (!is_null($folderName)) ? $folderName : 'images/UserProfileImages';
        $appDiskStorage = (!is_null($appDiskStorage)) ? $appDiskStorage : 'public';
        $imageName = (!is_null($Imagefilename)) ? $Imagefilename : md5(auth()->user()->email.now());

        $filePath = $uploadedFile->storeAs($folderName, $imageName.'.'.$uploadedFile->getClientOriginalExtension(), $appDiskStorage);

        return $filePath;
    }

}
