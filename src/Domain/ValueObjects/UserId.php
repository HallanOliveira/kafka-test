<?php

namespace App\Domain\ValueObjects;

use App\Domain\ValueObjects\Uuid;

class UserId
{
    public function __construct(
        private Uuid $id
    )
    {
        $this->setValue($id);
    }

    public function value(): Uuid
    {
        return $this->id;
    }

    public function setValue(Uuid $id): void
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Invalid user ID!');
        }
        $this->id = $id;
    }
}