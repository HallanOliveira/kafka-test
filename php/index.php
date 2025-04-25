<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use App\Infrastructure\Factories\NotificationProducerFactory;
use App\Application\Services\NotificationService;
use App\Application\DTO\NotificationDTO;

$dotenv = new Dotenv();
$envVars = $dotenv->load(__DIR__.'/.env'); // Carrega as variáveis
foreach ($_ENV as $key => $value) {
    putenv("{$key}={$value}");
}

$message = $argv[1] ?? null;
$notificationService = new NotificationService(NotificationProducerFactory::create());
$notificationService->execute(new NotificationDTO($message));