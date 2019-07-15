<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\UserDetail;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('service@iTalk.com', 'iTalk')
             ->subject('Reset Password | iTalk')
             ->view('email/mailreset')->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'remember_token' => $this->user->remember_token]);
    }
}
