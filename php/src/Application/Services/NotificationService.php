<?php

namespace App\Application\Services;

use App\Domain\Interfaces\ProducerInterface;
use App\Application\DTO\NotificationDTO;
use App\Domain\ValueObjects\NotificationMessage;

class NotificationService
{
    public function __construct(private ProducerInterface $producer)
    {
    }

    public function execute(NotificationDTO $message)
    {
        $kafkaMessage = new NotificationMessage(["message" => $message->getMessage()]);
        $this->producer->send($kafkaMessage);
    }
}
