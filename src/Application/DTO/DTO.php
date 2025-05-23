<?php

namespace App\Application\DTO;

abstract class DTO 
{
    public function __toArray(): array
    {
        return get_object_vars($this);
    }
}