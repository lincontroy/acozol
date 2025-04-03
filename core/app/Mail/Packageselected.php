<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Packageselected extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //
        $this->order = $order;
    }

    public function build()
    {
        return $this->from('support@ebbaymart.com', 'Ebbaymart')
                    ->subject('🎉🎉🎉You earned a commision from ebbaymart: ')
                    ->view('emails.package')
                    ->with([
                        'order' => $this->order,
                    ]);
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
}
