<?php

namespace App\Infrastructure\Loggers;

use App\Domain\Interfaces\LoggerInterface;

class ConsoleLogger implements LoggerInterface
{
    public function info(string $message, array $context = []): void
    {
        $this->log($message, $context);
    }

    public function debug(string $message, array $context = []): void
    {
        $this->log($message, $context, "DEBUG");
    }

    public function error(string $message, array $context = []): void
    {
        $this->log($message, $context, "ERROR");
    }

    private function log(
        string $message,
        array $context = [],
        $type = 'INFO'
    ): void {
        echo sprintf(
            "[%s] %s: %s %s",
            $type,
            date('Y-m-d H:i:s'),
            $message . PHP_EOL,
            empty($context) ? '' : json_encode($context) . PHP_EOL
        );
    }
}