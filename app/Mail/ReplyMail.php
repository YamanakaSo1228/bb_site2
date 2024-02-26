<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;
    public $replyBody;

    public function __construct($inquiry, $replyBody)
    {
        $this->inquiry = $inquiry;
        $this->replyBody = $replyBody;
    }

    public function build()
    {
        return $this->markdown('emails.reply')
            ->subject('お問い合わせに対する返信')
            ->with(['inquiry' => $this->inquiry,
                'replyBody' => $this->replyBody,
            ]);
    }
}
