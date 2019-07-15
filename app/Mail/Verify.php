<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class Verify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        
        $email = $request->email;

        $user = User::where('email', $email)->first();
        //$name = $user->name;

        return $this->from('service@iTalk.com', 'iTalk')
                    ->subject('Verify Email | iTalk')
                    ->view('email/mailverify')->with('user', $user);
    }
}
