<?php

namespace Tests\Stubs\Domain;

use Ramsey\Uuid\Uuid as UuidGenerator;
use App\Domain\ValueObjects\Uuid;

class UuidStub
{
    public static function random(): Uuid
    {
        return new Uuid(UuidGenerator::uuid4());
    }
}