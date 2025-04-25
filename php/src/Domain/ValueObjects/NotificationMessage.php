<?php

namespace App\Domain\ValueObjects;

class NotificationMessage
{
    private array $message;

    public function __construct(array $message)
    {
        $this->setValue($message);
    }

    public function value(): array
    {
        return $this->message;
    }

    public function setValue(array $message): void
    {
        if (empty($message) || !is_array($message)) {
            throw new InvalidArgumentException('Invalid message!');
        }
        $this->message = $message;
    }

    public function __toString(): string
    {
        return json_encode($this->message);
    }
}