<?php

namespace App\Presentation\Console\Commands;

use App\Domain\Exceptions\InvalidCommandArgumentsException;
use App\Infrastructure\Factories\LoggerFactory;
use App\Domain\Interfaces\LoggerInterface;
use App\Domain\Interfaces\ServiceInterface;

abstract class BaseCommand
{
    protected LoggerInterface $logger;
    protected ServiceInterface $service;

    public function __construct(protected array $arguments = [])
    {
        $this->logger = LoggerFactory::create();
        $this->initialize();
    }

    abstract public function __invoke(): void;

    abstract protected function initialize(): void;

    abstract protected function validateArguments(): void;
}