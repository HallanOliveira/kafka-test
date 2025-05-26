<?php

namespace App\Application\Services;

class NotifyService
{
    public function execute(array $payload): void
    {
        echo sprintf(
            "Titulo: %s;%sMensagem: %s;%sID Usuário: %s.%s",
            $payload['title'] ?? null,
            PHP_EOL,
            $payload['message'] ?? null,
            PHP_EOL,
            $payload['userId'] ?? null,
            PHP_EOL,
        );
    }
}
