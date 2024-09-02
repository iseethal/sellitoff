<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $name;
     public $planname;
     public $photocount;
     public $price;
     public $item;

    public function __construct($name,$planname,$photocount,$price,$item)
    {
        $this->name        = $name;  
        $this->planname    = $planname;  
        $this->photocount  = $photocount;  
        $this->price       = $price;  
        $this->item        = $item;  
    }

    public function build()

    {

    return $this->view('emails.subscribe')->with(['name' => $this->name,'planname' => $this->planname,'photocount' => $this->photocount,'price' => $this->price,'item' => $this->item]);

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Subscribe Mail',
        );
    }

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
