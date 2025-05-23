<?php

namespace App\Domain\ValueObjects;

use Exception;

class Title
{
    private string $title;

    public function __construct(string $title)
    {
        $this->setValue($title);
    }

    public function value(): string
    {
        return $this->title;
    }

    public function setValue(string $title): void
    {
        if (empty($title)) {
            throw new Exception('Invalid title!');
        }
        $this->title = $title;
    }
}