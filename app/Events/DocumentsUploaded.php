<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DocumentsUploaded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $documentId;

    public function __construct($documentId, $message)
    {
        $this->documentId = $documentId;
        $this->message = $message;
    }

    // Definir el canal
    public function broadcastOn()
    {
        return new Channel('cm-rama-docs'); // canal público
    }

    // Definir nombre del evento
    public function broadcastAs()
    {
        return 'document.uploaded';
    }
}
