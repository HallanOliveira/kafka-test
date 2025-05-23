<?php

namespace App\Domain\Interfaces;

interface ServiceInterface
{
    public function execute(): void;
}