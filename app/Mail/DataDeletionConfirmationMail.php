<?php

namespace App\Mail;

use App\Models\DataDeletionRequest;
use App\Models\UserProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataDeletionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public DataDeletionRequest $deletionRequest;
    public UserProfile $profile;

    public function __construct(DataDeletionRequest $deletionRequest, UserProfile $profile)
    {
        $this->deletionRequest = $deletionRequest;
        $this->profile = $profile;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We Have Received Your Data Deletion Request',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.deletion-request.confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
