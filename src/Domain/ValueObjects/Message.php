<?php

namespace App\Domain\ValueObjects;

use Exception;

class Message
{
    private string $message;

    public function __construct(string $message)
    {
        $this->setValue($message);
    }

    public function value(): string
    {
        return $this->message;
    }

    public function setValue(string $message): void
    {
        if (empty($message)) {
            throw new Exception('Invalid message!');
        }
        $this->message = $message;
    }
}