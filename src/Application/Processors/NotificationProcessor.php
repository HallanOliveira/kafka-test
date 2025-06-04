<?php

namespace App\Application\Processors;

use App\Domain\Interfaces\LoggerInterface;
use RdKafka\KafkaConsumer;
use RdKafka\Conf;
use App\Application\Services\NotifyService;

class NotificationProcessor
{
    protected KafkaConsumer $consumer;

    public function __construct(
        protected string $brokers, 
        protected string $topic,
        protected string $groupId,
        protected LoggerInterface $logger,
        protected NotifyService $service,
    )
    {
        $conf = new Conf();
        $conf->set('bootstrap.servers', $brokers);
        $conf->set('group.id', $groupId);
        $conf->set('auto.offset.reset', 'earliest');
        $this->consumer = new KafkaConsumer($conf);
        $this->topic = $topic;
        $this->consumer->subscribe([$topic]);
    }

    public function __invoke()
    {
        while(true) {
            try {
                $message = $this->consumer->consume(5000);
                if (empty($message->payload)) {
                    $this->logger->info('Sem mensagem no tópico.');
                    continue;
                }
                $this->logger->info('Processando mensagem.', [
                    "message_body" => $message->payload,
                ]);
                $this->service->execute(json_decode($message->payload, true));
            } catch (\Throwable $throwable) {
                $this->logger->error('Erro ao processar mensagem.', [
                    "error" => $throwable->getMessage(),
                    "kafka_message" => $message->payload,
                    "kafka_error" => $message->err ?? null
                ]);
            }
        }
    }
}
