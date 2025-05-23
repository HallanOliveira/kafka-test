<?php

namespace App\Tests\Stubs\Domain;

use App\Domain\ValueObjects\NotificationMessage;

class NotificationMessageStub
{
    public function random(): NotificationMessage
    {
        return new NotificationMessage([
            'message' => 'Test message',
        ]);
    }
}