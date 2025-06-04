<?php

namespace App\Infrastructure\Producers;

use App\Domain\Interfaces\ProducerInterface;
use App\Infrastructure\Producers\KafkaProducer;
use App\Domain\ValueObjects\NotificationMessage;

class NotificationProducer extends KafkaProducer implements ProducerInterface
{
   public function send(NotificationMessage $message): void
   {
       $this->produce($message->json());
   }
}
