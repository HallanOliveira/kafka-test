<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\ProducerInterface;
use App\Infrastructure\Producers\NotificationProducer;
use App\Infrastructure\Factories\LoggerFactory;

class NotificationProducerFactory
{
    public static function create(): ProducerInterface
    {
        return new NotificationProducer(
            brokers: getenv('KAFKA_BROKERS'),
            topic: getenv('KAFKA_TOPIC'),
            logger: LoggerFactory::create()
        );
    }
}