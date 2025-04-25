<?php

namespace App\Application\DTO;

class NotificationDTO
{
    public function __construct(
        private string $message
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}