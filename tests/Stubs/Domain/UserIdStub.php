<?php

namespace Tests\Stubs\Domain;

use Tests\Stubs\Domain\UuidStub;
use App\Domain\ValueObjects\UserId;

class UserIdStub
{
    public static function random(): UserId
    {
        return new UserId(UuidStub::random());
    }
}