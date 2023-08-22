<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Item;
use App\Solicitud;
use App\Fun;

class EditarSolicitudMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Info';
    public $tipo;
    public $solicitud;
    public $item;
    public $new_state;
    public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct( $tipo, Solicitud $solicitud, $item, $new_state )
    {
        $this->tipo = $tipo;
        $this->solicitud = $solicitud;
        $this->item = $item;
        $this->new_state = $new_state;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
               
        // 1 estado solicitud / 2 - estado item / 3 - estado + comentarios
        
        switch ( $this->tipo ) {
            case '1':
                $this->mensaje = 'Le informamos que el estado de la solicitud Nº '.$this->solicitud->id.' ('.$this->solicitud->titulo.') ha sido modificado a "'.Fun::getStatusSolicitudTexto($this->new_state).'".';
                break;
            case '2':
                $this->mensaje = 'Le informamos que el estado del item "'.$this->item.'" de la solicitud Nº '.$this->solicitud->id.' ('.$this->solicitud->titulo.') ha sido modificado a "'.Fun::getStatusItemTexto($this->new_state).'".';
                break;
            case '3':
                $this->mensaje = 'Le informamos que los comentarios de la solicitud Nº '.$this->solicitud->id.' ('.$this->solicitud->titulo.') han sido modificados.';
                break;
            case '4':
                $this->mensaje = 'Le informamos que los comentarios y el estado de la solicitud Nº '.$this->solicitud->id.' ('.$this->solicitud->titulo.') ha sido modificado a "'.Fun::getStatusSolicitudTexto($this->new_state).'".';
                break;
            default:
                # code...
                break;
        }

        //$subject = $this->mensaje;
        $subject = 'Modificación estado de Solicitud de compra Nº: '.$this->solicitud->id;
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'emails.edicionSolicitud',
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
