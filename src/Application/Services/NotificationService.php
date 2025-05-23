<?php

namespace App\Application\Services;

use App\Domain\Interfaces\ProducerInterface;
use App\Application\DTO\NotificationDTO;
use App\Domain\ValueObjects\NotificationMessage;
use App\Domain\ValueObjects\Message;
use App\Domain\ValueObjects\Title;
use App\Domain\ValueObjects\UserId;
use App\Domain\ValueObjects\Uuid;
use App\Domain\Interfaces\ServiceInterface;

class NotificationService implements ServiceInterface
{
    public function __construct(
        private readonly NotificationDTO $notificationDTO,
        private readonly ProducerInterface $producer
    )
    {
    }

    public function execute(): void
    {
        $this->producer->send(new NotificationMessage(
            new Message($this->notificationDTO->getMessage()),
            new Title($this->notificationDTO->getTitle()),
            new UserId(new Uuid($this->notificationDTO->getUserId()))
        ));
    }
}
