<?php

namespace App\Domain\ValueObjects;

class UserEmail
{
    private string $email;

    public function __construct(private string $email)
    {
        $this->setValue($email);
    }

    public function value(): string
    {
        return $this->email;
    }

    private function setValue(): void
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format');
        }
        $this->email = $email;
    }
}