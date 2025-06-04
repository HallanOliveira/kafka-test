<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use App\Presentation\Console\Commands\NotificationCommand;
use App\Application\Factories\NotificationProcessorFactory;

$dotenv = new Dotenv();
$envVars = $dotenv->load(__DIR__.'/.env');
foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
}

match (true) {
    str_starts_with($argv[1], 'worker:') => (NotificationProcessorFactory::create($argv[1]))(),
    default => (new NotificationCommand($argv))()
};