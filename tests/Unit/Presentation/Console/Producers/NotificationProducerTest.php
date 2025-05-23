<?php

namespace Test\Unit\Presentation\Console\Producers;

use PHPUnit\Framework\TestCase;
use App\Presentation\Console\Producers\NotificationProducer;
use App\Domain\ValueObjects\NotificationMessage;
use App\Domain\Interfaces\LoggerInterface;

class NotificationProducerTest extends TestCase
{
    private $notificationProducer;

    protected function setUp(): void
    {
        parent::setUp();
        $logger = $this->createMock(LoggerInterface::class);
        $logger
            ->expects($this->any())
            ->method('info');

        $logger
            ->expects($this->any())
            ->method('error');

        $this->notificationProducer = new NotificationProducer(
            brokers: 'localhost:9092',
            topic: 'test-topic',
            logger: $logger
        );
    }

    public function testSendError(): void
    {
        $this->expectException(\RuntimeException::class);

        $message = new NotificationMessage([
            'title' => 'Test Title',
            'message' => 'Test Message',
            'userId' => 1,
        ]);
        $this->notificationProducer->send($message);
    }
}
