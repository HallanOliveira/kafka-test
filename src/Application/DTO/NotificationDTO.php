<?php

namespace App\Application\DTO;

use App\Domain\ValueObjects\UserId;
use App\Application\DTO\DTO;

class NotificationDTO extends DTO
{
    public function __construct(
        private string $message,
        private string $title,
        private string $userId
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}