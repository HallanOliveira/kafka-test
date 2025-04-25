<?php

namespace App\Domain\Interfaces;

use App\Domain\ValueObjects\NotificationMessage;

interface ProducerInterface
{
    public function send(NotificationMessage $message): void;
}