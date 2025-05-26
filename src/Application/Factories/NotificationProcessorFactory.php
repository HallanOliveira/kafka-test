<?php

namespace App\Application\Factories;

use App\Application\Processors\NotificationProcessor;
use App\Infrastructure\Factories\LoggerFactory;
use App\Application\Services\NotifyService;

class NotificationProcessorFactory
{
    public static function create(): NotificationProcessor
    {
        return new NotificationProcessor(
            brokers: getenv('KAFKA_BROKERS'),
            topic: getenv('KAFKA_TOPIC'),
            logger: LoggerFactory::create(),
            service: new NotifyService()
        );
    }
}