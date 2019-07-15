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
use Mail;
use Str;

class UserService2
{
/*    public function __construct(AttachmentService $attServices)
    {
        $this->attServices = $attServices;
        $this->attServices->setImage(640, 640, 200000);
    	$this->password_min = 6;
    }*/

	public function getProfile($user_id)
	{
		$user = User::find($user_id);

		if(isset($user))
		{
	        $fractal = fractal()
	            ->item($user)
	            ->parseIncludes(['detail'])
	            ->transformWith(new UserTransformer)
	            ->serializeWith(new ArraySerializer)
	            ->toArray();

	        $response = [
	            'status'  => 200,
                'message' => trans('messages.user.success.found'),
	            'result' => $fractal
	        ];

		}
		else
		{
	        $response = [
	            'status'  => 400,
                'message' => trans('messages.user.failed.found'),
	        ];

		}

        return response()->json($response);
	}

	public function updateUsername($user_id, $username)
	{
		$user = User::find($user_id);

		if(isset($user))
		{
			$userdetail = $user->userdetail;
			if(empty($userdetail->username))
			{
				$usernameExist = $userdetail->where('username', $username)->first();
				if(!$usernameExist)
				{
					$update = $userdetail->update([
		                'username' => $username
		            ]);

		            if($update)
		            {
		            	$fractal = fractal()
			            ->item($user)
			            ->parseIncludes(['detail'])
			            ->transformWith(new UserTransformer)
			            ->serializeWith(new ArraySerializer)
			            ->toArray();

				        $response = [
				            'status'  => 200,
                			'message' => trans('messages.user.success.setup'),
				            'result' => $fractal
				        ];
		            }
		            else
		            {
		            	$response = [
				            'status'  => 400,
                			'message' => trans('messages.user.failed.setup'),
				        ];
		            }
				}
				else
				{
					$response = [
			            'status'  => 400,
                		'message' => trans('messages.user.failed.usrnm_taken'),
			        ];
				}
			}
			else
			{
				$response = [
		            'status'  => 400,
            		'message' => trans('messages.user.failed.usrnm_set'),
		        ];
			}
		}
		else
		{
	        $response = [
	            'status'  => 400,
        		'message' => trans('messages.user.failed.found'),
	        ];

		}

        return response()->json($response);
	}

	public function updateEmail($user_id, $email)
	{
		$user = User::find($user_id);

		if(isset($user))
		{
			$userdetail = $user->userdetail;

			$emailExist = $userdetail->where('email', $email)->first();
			if(!$emailExist)
			{
				$update = $userdetail->update([
	                'email' => $email,
	                'email_is_verified' => 0
	            ]);

	            if($update)
	            {
	            	/*$fractal = fractal()
		            ->item(User::find($user_id))
		            ->parseIncludes(['detail'])
		            ->transformWith(new UserTransformer)
		            ->serializeWith(new ArraySerializer)
		            ->toArray();*/

			        $response = [
			            'status'  => 200,
        				'message' => trans('messages.user.success.email_link'),
			            'result' => $fractal
			        ];
	            }
	            else
	            {
	            	$response = [
			            'status'  => 400,
        				'message' => trans('messages.user.failed.email_link'),
			        ];
	            }
			}
			else
			{
				$response = [
		            'status'  => 400,
    				'message' => trans('messages.user.failed.email_ady_link'),
		        ];
			}
		}
		else
		{
	        $response = [
	            'status'  => 400,
        		'message' => trans('messages.user.failed.found'),
	        ];

		}

        return response()->json($response);
	}

    public function inputPassword($user_id, $password, $new_password)
    {
        $store = false;
        $pass_incorrect = false;
        $user  = User::find($user_id);

        if(isset($user))
        {
            if(strlen($new_password) >= $this->password_min)
            {
                if(empty($user->password))
                {
                    //First time setting password
                    $store = $user->update([
                        'password' => Hash::make($new_password),
                    ]);
                }
                else 
                {
                    //Change password second time onwards
                    if(Hash::check($password, $user->password))
                    {
                        $store = $user->update([
                            'password' => Hash::make($new_password),
                        ]);
                    }
                    else {
                        $pass_incorrect = true;
                    }
                }
                

                if ($store) {
	            	$fractal = fractal()
		            ->item(User::find($user_id))
		            ->parseIncludes(['detail'])
		            ->transformWith(new UserTransformer)
		            ->serializeWith(new ArraySerializer)
		            ->toArray();
                    $response = [
                        'status'  => 200,
        				'message' => trans('messages.user.success.pass_update'),
        				'result' => $fractal
                    ];
                }
                else if($pass_incorrect)
                {
                    $response = [
                        'status'  => 400,
        				'message' => trans('messages.user.failed.pass_incorrect'),
                    ];
                }
                else
                {
                    $response = [
                        'status'  => 400,
        				'message' => trans('messages.user.failed.pass_update'),
                    ];

                }
            }
            else
            {
                $response = [
                    'status'  => 400,
    				'message' => trans('messages.user.failed.pass_length', ['min' => $this->password_min]),
                ];

            }
        }
        else
        {
            $response = [
                'status'  => 400,
        		'message' => trans('messages.user.failed.found'),
            ];

        }

        return response()->json($response);
    }

    public function updateProfilePicture($user_id, $picture)
    {
    	$user = User::find($user_id);

    	if(isset($user))
    	{
            //upload group profile photo
            $_request = (object)[
                'user_id'           => $user_id,
                'file'              => $picture,
                'type'              => '1',
            ];
            $pic_resp = $this->attServices->processFile($_request);

            if($pic_resp['resp_status'] == 200)
            {
	            $image_id = $pic_resp['resp_result']->id;
	            $image_path = $pic_resp['resp_result']->path_name;
	            $image_name = $pic_resp['resp_result']->original_name;

	        	$user->userDetail
	        		->where('user_id', $user_id)->update([
	        			'image_id' => $image_id,
	        			'image_path' => $image_path,
	        			'image_name' => $image_name
	        	]);
            	$fractal = fractal()
	            ->item(User::find($user_id))
	            ->parseIncludes(['detail'])
	            ->transformWith(new UserTransformer)
	            ->serializeWith(new ArraySerializer)
	            ->toArray();
		        $response = [
		            'status'  => $pic_resp['resp_status'],
		    		'message' => trans('messages.user.success.pic_upload'),
		    		'result'  => $fractal
		        ];

            }
            else
            {
		        $response = [
		            'status'  => $pic_resp['resp_status'],
		    		'message' => $pic_resp['resp_message'],
		    		'result'  => []
		        ];
            }

    	}
    	else
    	{
	        $response = [
	            'status'  => 400,
	    		'message' => trans('messages.user.failed.found'),
	    		'result'  => []
	        ];

    	}

        return response()->json($response);
    }

    public function verifyEmail($email)
    {
    	$user = User::where('email', $email)->first();

    	if(isset($user))
    	{
			$verifyToken = $user->verifyToken;
    		$email_is_verified = $user->userdetail->email_is_verified;

			if(($email_is_verified == 0) && ($verifyToken == null))
    		{
				if(!isset($verifyToken))
	    		{
					//Set verification token
					$verifyToken = str_random(100);

					//Save token into database
					$user['verifyToken'] = $verifyToken;
					$user->save();
					$thisuser = array('name'=>$user->name,'email'=>$user->email, 'verifyToken'=>$user->verifyToken);

					//Send email to user
					Mail::send('email/mailverify', $thisuser, function($message) use ($user)
					{
						$message->to($user['email'], $user['name'])->subject('Verify Email');
					});

					echo "Email Sent. Check your inbox.";
	    		} 		   
    		}
    		else if(($email_is_verified == 0) && (($verifyToken !== null)))
    		{
			    $user = User::where('email', $email)->first();

				if(isset($user))
			    {
					$userdetail = $user->userdetail;
					$emailExist = $userdetail->where('email', $email)->first();

					if($emailExist)
					{
						$update = $userdetail->update([
			                'email_is_verified' => 1
			            ]);

						$user = User::where('verifyToken', $verifyToken)->first();
						$email = $user->email;

						echo "Email is verified.";

						//Delete token in database
						$user['verifyToken'] = null;
						$user->save();
			        }
			        else
			        {
			        	echo 'Error.';
			        }
			    }    			
    		}	   		
    		elseif(($email_is_verified == 1))
    			echo "Email is already verified.";
    	}
	}

	public function resetPassword($email)
	{
		$user = User::where('email', $email)->first();
		$remember_token = $user->remember_token;

		if(isset($user))
		{
			if(!isset($remember_token))
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
				echo 'Please request again.';
			}
		}
		else
		{
			echo 'User not found';
		}		
	}

	public function setPassword($email)
	{
		$user = User::where('email', $email)->first();
		$remember_token = $user->remember_token;

		if(isset($remember_token))
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

		    echo redirect()->route('resetPasswordSuccess');
		}
		else
			echo 'Error';
	}
}
