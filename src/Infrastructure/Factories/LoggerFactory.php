<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\LoggerInterface;

use App\Infrastructure\Loggers\ConsoleLogger;

class LoggerFactory
{
    public static function create(): LoggerInterface
    {
        return new ConsoleLogger();
    }
}