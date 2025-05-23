<?php

namespace App\Domain\ValueObjects;

use Exception;
use App\Domain\ValueObjects\Message;
use App\Domain\ValueObjects\Title;
use App\Domain\ValueObjects\UserId;


class NotificationMessage
{
    private array $notificationMessage;

    public function __construct(
        Message $message,
        Title $tile,
        UserId $userId
    )
    {
        $this->setValue($message, $tile, $userId);
    }

    public function value(): array
    {
        return $this->notificationMessage;
    }

    public function setValue(Message $message, Title $tile, UserId $userId): void
    {
        $this->notificationMessage = [
            'message' => $message->value(),
            'title' => $tile->value(),
            'userId' => $userId->value()->value()
        ];
    }

    public function json(): string
    {
        return json_encode($this->notificationMessage);
    }
}