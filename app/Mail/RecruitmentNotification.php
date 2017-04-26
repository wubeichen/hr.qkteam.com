<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecruitmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $recruitment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recruitment)
    {
        $this->recruitment = $recruitment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【招新报名】' . $this->recruitment->name)
            ->view('mail.freshmen');
    }
}
