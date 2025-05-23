<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use App\Presentation\Console\Commands\NotificationCommand;

$dotenv = new Dotenv();
$envVars = $dotenv->load(__DIR__.'/.env');
foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
}

function dd(mixed $value, array ...$values) {
    var_dump($value, $values);die;
}

(new NotificationCommand($argv))();