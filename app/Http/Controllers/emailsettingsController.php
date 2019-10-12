<?php
/**
 * @author Mofehintolu MUMUNI
 *
 * @description Subscription controller that handles user subscriptions
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App\Http\Controllers;

use App\User;
use App\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class emailsettingsController extends Controller
{
    protected function validatorInvoice(array $data)
    {
        return Validator::make($data, [
            'Invoice Message' => ['required','string', 'max:2000'],
        ]);
    }

    protected function validatorProposal(array $data)
    {
        return Validator::make($data, [
            'Proposal Message' => ['required','string', 'max:2000'],
        ]);
    }

    protected function validatorAgreement(array $data)
    {
        return Validator::make($data, [
            'Agreement Message' => ['required','string', 'max:2000'],
        ]);
    }

    /**
     * @description : GET SINGLE USER EMAILS SETTINGS DETAILS
     *
     */
    function index()
    {
        //get user emails using relationships between user model and email settings model
        $userEmails = User::where('id',auth()->user()->toArray()['id'])->find(1)->emailsetting()->get();

        if($userEmails)
        {
            //cast collection result to array
            $collectionResult = $userEmails->toArray();
            if(sizeof($collectionResult) != 0)
            {
                return view('emailsettings')->with(['status'=> 'success','data'=>$collectionResult[0]]);
            }
            else
            {
                return view('emailsettings')->with(['status'=> 'failure','data'=>null]);

            }

        }
        else
        {
            return view('emailsettings')->with(['status'=> 'failure','data'=>null]);
        }

    }


    /**
     * @description : UPDATE SINGLE USER EMAILS SETTINGS DETAILS
     *
     */

    function updateEmailSettings(Request $request)
    {
        $invoiceValidator = $this->validatorInvoice(['Invoice Message'=>$request->input('invoice')]);
        $proposalValidator = $this->validatorProposal(['Proposal Message'=>$request->input('proposal')]);
        $agreementValidator = $this->validatorAgreement(['Agreement Message'=>$request->input('agreement')]);

        if((!$invoiceValidator->fails()) && (!$proposalValidator->fails()) && (!$agreementValidator->fails()))
        {
            //get user via email settings model and perform update
            $userEmailsDetails = EmailSetting::where('user_id',auth()->user()->toArray()['id'])->first();

            $userEmailsDetails->auto_invoice_message = $request->input('invoice');
            $userEmailsDetails->auto_proposal_message = $request->input('proposal');
            $userEmailsDetails->auto_agreement_message = $request->input('agreement');
            $userEmailsDetails->save();

            //check if update was successful and return message
            if($userEmailsDetails)
            {
                return redirect('/users/settings/emails')->with('editSuccess','Email Settings updated successfully!');
            }
            else
            {
                return redirect('/users/settings/emails')->with('editFailure','Email Settings not updated successfully!');
            }

        }
        else
        {   //define error string
            $errorString = [];
            if($invoiceValidator->fails())
            {
                $errorsArrayInvoice = $invoiceValidator->errors()->all();
                //pass in a ponter of the $errorString
                array_map(function($value)use(&$errorString)
                {
                    $errorString[] = $value;
                },$errorsArrayInvoice);

            }

            if($proposalValidator->fails())
            {
                $errorsArrayProposal = $proposalValidator->errors()->all();
                //pass in a ponter of the $errorString
                array_map(function($value)use(&$errorString)
                {
                    $errorString[] = $value;
                },$errorsArrayProposal);

            }

            if($agreementValidator->fails())
            {
                $errorsArrayAgreement = $agreementValidator->errors()->all();
                //pass in a ponter of the $errorString
                array_map(function($value)use(&$errorString)
                {
                $errorString[] = $value;
                },$errorsArrayAgreement);

            }

          return redirect('/users/settings/emails')->with('editErrors',$errorString);

        }

    }


}
