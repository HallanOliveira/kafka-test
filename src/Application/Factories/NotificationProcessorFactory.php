<?php

namespace App\Application\Factories;

use App\Application\Processors\NotificationProcessor;
use App\Application\Processors\NotificationProcessor2;
use App\Infrastructure\Factories\LoggerFactory;
use App\Application\Services\NotifyService;
use InvalidArgumentException;

class NotificationProcessorFactory
{
    public static function create(string $command): NotificationProcessor
    {
        $processor = explode(":", $command)[1];
        return match ($processor) {
            'process-notification' => new NotificationProcessor(
                brokers: getenv('KAFKA_BROKERS'),
                topic: getenv('KAFKA_TOPIC'),
                groupId: $processor . 'asd',
                logger: LoggerFactory::create(),
                service: new NotifyService()
            ),
            'process-notification-2' => new NotificationProcessor2(
                brokers: getenv('KAFKA_BROKERS'),
                topic: getenv('KAFKA_TOPIC'),
                groupId: $processor,
                logger: LoggerFactory::create(),
                service: new NotifyService()
            ),
            default => throw new InvalidArgumentException("Invalid Command {$processor}.")
        };
    }
}