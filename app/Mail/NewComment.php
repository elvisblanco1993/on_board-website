<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewComment extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $ticket, $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $ticket, $comment)
    {
        $this->user = $user;
        $this->ticket = $ticket;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.new-comment')->subject('Re: ' . $this->ticket->title . '(Ticket ID: )' . $this->ticket->ticket_id);
    }
}
