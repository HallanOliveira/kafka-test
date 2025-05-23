<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\UserId;
use App\Domain\ValueObjects\UserEmail;

class User
{
    public function __construct(
        private string $name,
        private string $email,
        private UserId $userId
    )
    {
    }

    public static function create(string $name, string $email, UserId $userId): self
    {
        return new self($name, $email, $userId);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }
}