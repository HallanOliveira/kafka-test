<?php

namespace App\Presentation\Console\Producers;

use App\Domain\Interfaces\ProducerInterface;
use App\Presentation\Console\Producers\KafkaProducer;
use App\Domain\ValueObjects\NotificationMessage;

class NotificationProducer extends KafkaProducer implements ProducerInterface
{
    public function send(NotificationMessage $message): void
    {
        $this->topic->produce(RD_KAFKA_PARTITION_UA, 0, $message->__toString());

        $this->producer->poll(0);
        while ($this->producer->getOutQLen() > 0) {
            $this->producer->poll(50);
        }

        echo "Mensagem enviada!\n";
    }
}
