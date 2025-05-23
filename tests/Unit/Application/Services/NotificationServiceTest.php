<?php

namespace Tests\Unit\Application\Services;

use PHPUnit\Framework\TestCase;
use App\Application\Services\NotificationService;
use App\Domain\Interfaces\ProducerInterface;
use App\Application\DTO\NotificationDTO;
use App\Domain\ValueObjects\NotificationMessage;
use Tests\Stubs\Domain\UserIdStub;

class NotificationServiceTest extends TestCase
{
    protected ProducerInterface $producer;
    protected NotificationService $notificationService;

    public function setUp(): void
    {
        parent::setUp();
        $this->producer = $this->createMock(ProducerInterface::class);
        $this->producer
            ->expects($this->once())
            ->method('send')
            ->with($this->isInstanceOf(NotificationMessage::class));

        $this->notificationService = new NotificationService($this->producer);
    }

    public function testExecuteSuccess()
    {
        $this->notificationService->execute(
            new NotificationDTO(
                'Test message',
                'Test title',
                UserIdStub::random()
            )
        );
        $this->assertTrue(true);
    }
}