<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Solicitud;
use App\Item;

class NuevaSolicitudMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Info';
    public $solicitud;
    public $items;
    /**
     * Create a new message instance.
     */
    public function __construct(Solicitud $solicitud, array $items)
    {
        $this->solicitud = $solicitud;
        $this->items = $items;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        $subject = 'Nueva solicitud de compra - #' . $this->solicitud->id . ': ' . $this->solicitud->titulo;

        return new Envelope(
            subject: $subject,
        );
    }

    /**
    * Construye el mensaje.
    *
    * @return $this
    */
    public function buildXXX() {

        //$subject = 'Info - Solicitud #' . $this->solicitud->id . ': ' . $this->solicitud->titulo;

        return $this->view('emails.solicitud')
            ->subject($subject)
            ->with('solicitud', $this->solicitud)
            ->with('items', $this->items);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'emails.nuevaSolicitud',
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
