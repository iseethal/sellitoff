<?php

namespace App\Mail;



use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $name;
     public $string;

    public function __construct($name,$string)
    {
        $this->name    = $name;
        $this->string  = $string;
    }

    public function build()
    {

    return $this->view('emails.verification')->with(['name' => $this->name,'string' => $this->string]);

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            subject: 'Verification Mail',
            
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}



// public $user;

// public function __construct($user)
// {
//     $this->user = $user;
// }

// public function build()
// {
//     return $this->view('emails.welcome')->with(['user' => $this->user]);
// }