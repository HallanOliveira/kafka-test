<?php

namespace App\Presentation\Console\Commands;

use App\Application\Services\NotificationService;
use App\Application\DTO\NotificationDTO;
use App\Domain\ValueObjects\UserId;
use App\Domain\ValueObjects\Uuid;
use App\Infrastructure\Factories\NotificationProducerFactory;
use App\Domain\Exceptions\InvalidCommandArgumentsException;
use App\Presentation\Console\Commands\BaseCommand;
use Tests\Stubs\Domain\UuidStub;

class NotificationCommand extends BaseCommand
{
    public function __invoke(): void
    {
        $this->service->execute();
    }

    protected function initialize(): void
    {
        try {
            $this->validateArguments();
            $message = $this->arguments[1] ?? null;
            $title = $this->arguments[2] ?? null;
            $userId = UuidStub::random()->value();
            $this->service = new NotificationService(
                new NotificationDTO($message, $title, $userId),
                NotificationProducerFactory::create(),
            );
        } catch (InvalidCommandArgumentsException $e) {
            $this->logger->error($e->getMessage());
            die;
        }
    }

    /**
     * Validate command arguments.
     *
     * @throws InvalidCommandArgumentsException
     */
    protected function validateArguments(): void
    {
        if (count($this->arguments) < 3) {
            throw new InvalidCommandArgumentsException();
        }
    }
}
