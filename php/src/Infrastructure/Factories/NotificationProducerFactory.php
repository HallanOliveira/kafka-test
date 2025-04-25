<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\ProducerInterface;
use App\Presentation\Console\Producers\NotificationProducer;

class NotificationProducerFactory
{
    public static function create(): ProducerInterface
    {
        return new NotificationProducer(
            brokers: getenv('KAFKA_BROKERS'),
            topic: getenv('KAFKA_TOPIC')
        );
    }
}