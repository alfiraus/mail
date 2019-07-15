<?php

namespace App\Services\Users;

use App\User;
use App\UserDetail;
use App\Models\Image;
use App\Transformers\UserTransformer;
use App\Services\Chat\AttachmentService;
use Hash;
use Storage;
use Spatie\Fractalistic\ArraySerializer;
use App\Services\Users\UserService;
use App\Mail\Verify;
use App\Mail\ResetPassword;
use Mail;

class UserService
{
    
	public function sendVerifyEmail($email) 
	{
		$user = User::where('email', $email)->first();

	    if(isset($user))
	    {
		    //Set verification token
			$verifyToken = str_random(100);

			//Save token into database
			$user['verifyToken'] = $verifyToken;
			$user->save();
			$thisuser = array('name'=>$user->name,'email'=>$user->email, 'verifyToken'=>$user->verifyToken);
		}	

		Mail::to($email)->send(new Verify($user));

		echo "Email Sent. Check your inbox.";
	}

    public function verifyEmail($email, $verifyToken)
    {
    	$user = User::where('verifyToken', $verifyToken)
    				->where('email', $email)->first();

		if(isset($user))
		{
		    $update = $user->userdetail->update([
			                'email_is_verified' => 1
			            ]);

			//Delete token in database
			$user['verifyToken'] = null;
			$user->save();
			
			echo "Email is verified.";
		}
		else
		{
			echo 'Error.';
		}
	}

	public function resetPassword($email)
	{
		$user = User::where('email', $email)->first();

		if(isset($user))
		{			
			//Set token and save token into database
			$user->remember_token = str_random(100);
			$user->save();

			Mail::to($email)->send(new ResetPassword($user));

			echo "Email Sent. Check your inbox.";
		
		}
		else
		{
			echo 'User not found';
		}		
	}

	public function setPassword($email, $remember_token)
	{

		$user = User::where('email', $email)
    				->where('remember_token', $remember_token)->first();

		if(isset($user))
		{
			$username = $user->userdetail->username;
			$email = $user->userdetail->email;

			$data = array('username' => $username,
			'email' => $email,
			'remember_token' => $remember_token);		

			echo view('setNewPassword')->with('data', $data);
		}
		else
		{
			echo "Please request again.";
		}
	}

	public function newPassword($request)
	{
		$remember_token = $request->remember_token;
		$new_password = $request->password;

		$user = User::where('remember_token', $remember_token)->first();

		if(isset($user))
		{
			$id = $user->id;

			$user['remember_token'] = null;
			$user->save();

			$userdetail = UserDetail::where('id', $id)->first();
			$user_id = $userdetail->user_id;

    		$update = $user->update([
	                'password' => Hash::make($new_password),
	            ]);

    		if($update)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
		}
		else
			echo 'Error';
	}
}
