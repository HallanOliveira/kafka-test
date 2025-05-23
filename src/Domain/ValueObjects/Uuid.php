<?php

namespace App\Domain\ValueObjects;

class Uuid
{
    public function __construct(
        private string $uuid
    ) {
        $this->setValue($uuid);
    }

    public function value(): string
    {
        return $this->uuid;
    }

    public function setValue(string $uuid): void
    {
        if (empty($uuid) || ! is_string($uuid)) {
            throw new \InvalidArgumentException('Invalid UUID!');
        }
        $this->uuid = $uuid;
    }
}