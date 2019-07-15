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
use App\Mail\Verify;
use App\Mail\ResetPassword;

class MailController extends Controller {

	public function __construct (UserService $userservice, Verify $verify) 
	{
		$this->userservice = $userservice;
		$this->verify = $verify;
	}

	public function sendVerify($email)
	{
		$this->userservice->sendVerifyEmail($email);
	}

	public function verifyEmail(Request $request) 
	{
		$verifyToken = $request->verifyToken;
		$email = $request->email;
	    $this->userservice->verifyEmail($email, $verifyToken);
	}

	public function resetPassword(Request $request)
	{
		$email = $request->email;
		$this->userservice->resetPassword($email);
	}

	public function setPassword(Request $request)
	{
		$email = $request->email;
		$remember_token = $request->remember_token;
	    $this->userservice->setPassword($email, $remember_token);
	}

	public function newPassword(Request $request)
	{
		$this->validate(request(), [
			'email' => 'required',
			'password' => 'required|confirmed|min:6',
		]);

		$request = $request;

	    $this->userservice->newPassword($request);

	    if($request)
	    {
	    	//return  view('resetPasswordSuccess');
	    	return redirect()->route('resetPasswordSuccess');
	    }
	    else
	    {
	    	echo 'Fail';
	    }
	}
}