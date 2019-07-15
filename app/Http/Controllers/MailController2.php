<?php

namespace App\Http\Controllers;
use Laravel\Passport\HasApiTokens;
use App\User;
use App\UserDetail;
use App\Services\Users\UserService;
use Mail;
use Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\View;

class MailController2 extends Controller {

	protected $userservice;

	public function __construct (UserService $userservice) 
	{
		$this->userservice = $userservice;
	}

	public function sendVerifyEmail($email) 
	{
		$user = User::where('email', $email)->first();

	    if(isset($user))
	    {
		    //Set verification token
			$verifyToken = str_random(100);
			echo $verifyToken;

			//Save token into database
			$user['verifyToken'] = $verifyToken;
			$user->save();
			$thisuser = array('name'=>$user->name,'email'=>$user->email, 'verifyToken'=>$user->verifyToken);
		}	

		Mail::send('mailverify', $thisuser, function($message) use ($user)
		{
			$message->to($user['email'], $user['name'])->subject('Verify Email');
		});

		echo "Email Sent. Check your inbox.";
	}

	public function verifyEmail($verifyToken)
	{
	    $user = User::where('verifyToken', $verifyToken)->first();
	    
	    $email = $user->email;

	    $this->userservice->verifyEmail($email);

	    echo "Email is verified.";

		//Delete token in database
		$user['verifyToken'] = null;
		$user->save();
	}

	public function sendResetPassword($email)
	{
	    $user = User::where('email', $email)->first();

		if(isset($user))
		{
			//Set token
			$remember_token = str_random(100);

			//Save token into database
			$user['remember_token'] = $remember_token;
			$user->save();
			$thisuser = array('name'=>$user->name,'email'=>$user->email, 'remember_token'=>$user->remember_token);

			Mail::send('email/mailreset', $thisuser, function($message) use ($user)
			{
				$message->to($user['email'], $user['name'])->subject('Reset Password');
			});

			echo "Email Sent. Check your inbox.";
		}
		else
		{
			echo 'Nope.';
		}
	}

	public function resetPassword($remember_token)
	{
		
		$user = User::where('remember_token', $remember_token)->first();

		if(isset($user))
		{
		    $username = $user->userdetail->username;
		    $email = $user->userdetail->email;

		    $data = array('username' => $username,
		    			  'email' => $email,
						  'remember_token' => $remember_token);

		    return view('newPassword', $data);
		}	    
		else
			echo 'Please request again.';
	}

	public function newPassword(Request $request)
	{
		$this->validate(request(), [
			'email' => 'required',
			'password' => 'required|confirmed|min:6',
		]);

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

		    $this->userservice->resetPassword($user_id, $new_password);

		    return redirect()->route('resetPasswordSuccess');		
		}
		else
			echo 'Error';
	}
}