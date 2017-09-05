<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JoinNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $school_number;
    public $name;
    public $image_bg;
    public $image_logo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $school_number, $name)
    {
        $this->password = $password;
        $this->school_number = $school_number;
        $this->name = $name;
        $this->image_bg = 'http://hr.qkteam.com/images/bg.jpg';
        $this->image_logo = 'http://hr.qkteam.com/images/qk_logo.png';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('【欢迎加入晴空工作室】' . $this->name)
          ->view('mail.join');
    }
}
