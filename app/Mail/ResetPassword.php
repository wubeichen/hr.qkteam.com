<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $password;
    public $school_number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $password, $school_number)
    {
        $this->name = $name;
        $this->password = $password;
        $this->school_number = $school_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【晴空工作室】密码重置')->view('mail.resetpassword');
    }
}
