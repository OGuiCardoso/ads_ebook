<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EbookMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfUrl;

    /**
     * Create a new message instance.
     * @param string $pdfUrl
     */
     
    public function __construct($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ebook Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: '/app/ebookMail',
        );
    }

    public function buid(){
        return $this->view('app/ebookMail')
                    ->with([
                        'pdfUrl' => $this->pdfUrl,
                    ]);
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
