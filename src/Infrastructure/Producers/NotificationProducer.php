<?php

namespace App\Infrastructure\Producers;

use App\Domain\Interfaces\ProducerInterface;
use App\Infrastructure\Producers\KafkaProducer;
use App\Domain\ValueObjects\NotificationMessage;
use App\Domain\ValueObjects\NotificationTitle;
use App\Domain\ValueObjects\UserId;

class NotificationProducer extends KafkaProducer implements ProducerInterface
{
   public function send(NotificationMessage $message): void
   {
       $this->produce($message->json());
   }
}
