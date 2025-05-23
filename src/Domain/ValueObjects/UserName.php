<?php

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class UserName
{
    public function __construct(
        private string $name
    ) {
        $this->setValue($name);
    }

    public function value(): string
    {
        return $this->name;
    }

    public function setValue(string $name): void
    {
        if (empty($name) || ! is_string($name)) {
            throw new InvalidArgumentException('Invalid user name!');
        }
        $this->name = $name;
    }
}