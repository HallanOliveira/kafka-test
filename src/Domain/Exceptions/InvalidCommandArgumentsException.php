<?php

namespace App\Domain\Exceptions;

use Exception;

class InvalidCommandArgumentsException extends Exception
{
    public function __construct(string $message = 'Invalid number of arguments provided. Usage: php notification.php <message> <title> [<user_id>]')
    {
        parent::__construct($message, 400);
    }

}