<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Profile;
use App\Subscription;

class AuthController extends Controller
{
    public function login(Request $request){
        //logic for logging in with username or email, and password.
        if(
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ){
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token');
			return $this->SUCCESS('Login successful', ['access_token' => $token->accessToken, 'expires_in'=>strtotime($token->token->expires_at)- time(), 'user' => $user]);
        }else{
			return $this->ERROR('Login failed');
        }
    }

    public function register(Request $request){
        // Validate Input

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if($validation->fails()) return $this->ERROR("error", $validation->errors());

        DB::beginTransaction();

        try{

            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->name = $request->name;
            // $user->password = bcrypt($request->password);
            // $user->save();

            $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);

            $name = explode(" ",$request->name);
            $user->profile()->create(['first_name' => $name[0], 'last_name' => $name[1]]);

            $subscriber = new Subscription;
            $subscriber->subscribeToPlan(1 , $user->id, 12);

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult;

            DB::commit();
        }catch (\Throwable $e) {
            DB::rollback();
            return $this->ERROR($e);
        }
        // send email

        return $this->SUCCESS('Successfully created user', ['access_token' => $token->accessToken, 'expires_in'=>strtotime($token->token->expires_at)- time(), 'user' => $user]);

    // }

    }

	
    public function request_reset(Request $request){
        try{
            $request->validate([ 'email' => 'required|string|email' ]);
            $user = User::findOrFail($request->email);
            if (!$user) return $this->ERROR("We can't find a user with the e-mail address " . $request->email);

            $passwordReset = PasswordReset::updateOrCreate(
                ['email' => $user->email],
                [
                    'email' => $user->email,
                    'token' => $this->GENERATE_TOKEN(6)
                ]
            );
            if ($user && $passwordReset){
                //Send email
            } 
            logger("Password reset link sent to " . Auth::user()->email);
            return $this->SUCCESS("Password reset link sent");
        }
        catch(\Throwable $e){
            logger("Password reset failed for " . Auth::user()->email);
            return $this->ERROR('Password rest failed. Please try again');
        }
    }

    public function findResetToken($token){
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset)
            return $this->ERROR("This password reset token is invalid.");
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return $this->ERROR("This link has expired!");
        }
        return $this->SUCCESS('Enter a new password', $passwordReset->token);
    }

    public function resetPassword(Request $request){
        DB::transaction();
        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string|confirmed',
                'token' => 'required|string'
            ]);
            
            if ($validation->fails())  return $this->ERROR($validation->errors());

            $passwordReset = PasswordReset::where([
                ['token', $request->token],
                ['email', $request->email]
            ])->first();
            if (!$passwordReset) return $this->ERROR("This password reset token is invalid.", $request->token);
            
            $user = User::findOrFail($request->email);
            if (!$user) return $this->ERROR("We can't find a user with the e-mail address " . $request->email);

            $user->password = bcrypt($request->password);
            $user->save();
            $passwordReset->delete();

            DB::commit();
        }
        catch(\Throwable $e){
            return $this->ERROR('Password reset failed', $e);
        }
        //Send Email
        return $this->SUCCESS("Password reset successful!");
    }

    public function updatePassword(Request $request){
        try{
            $validation = Validator::make($request->all(), [
                'current' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            
            if ($validation->fails()) {
                return $this->ERROR('Password update failed', $validation->errors());
            }
    
            $user = User::find(Auth::user()->id);
            if (!Hash::check($request->current, $user->password)) {
                return $this->ERROR('Current password does not match');
            }
    
            $user->password = bcrypt($request->password);
            $user->save();
    
            return $this->SUCCESS('Password changed');
        }
        catch(\Throwable $e){
            return $this->ERROR('Password update failed', $e);
        }
    }


    public function logout(){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();        
        return $this->SUCCESS('You are successfully logged out');
    }

    public function clear_session(){
        $token_id = Auth::user()->token()->id; // Use this to revoke refresh_token
        $user_id = Auth::user()->id;
        DB::table('oauth_access_tokens AS OAT')
            ->join('oauth_refresh_tokens AS ORT', 'OAT.id', 'ORT.access_token_id')
            ->where('OAT.id', '!=', $token_id)
            ->where('OAT.user_id', $user_id)
            ->update([
                'OAT.revoked' => true,
                'ORT.revoked' => true
            ]);
        return $this->SUCCESS();
    }
	
}
