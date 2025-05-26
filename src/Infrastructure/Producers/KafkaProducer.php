<?php

namespace App\Infrastructure\Producers;

use RdKafka\Producer;
use RdKafka\Conf;
use RdKafka\ProducerTopic;
use App\Domain\Interfaces\LoggerInterface;

abstract class KafkaProducer
{
    protected Producer $producer;
    protected ProducerTopic $topic;

    public function __construct(
        string $brokers, 
        string $topic,
        private LoggerInterface $logger
    ) {
        $conf = new Conf();
        $conf->set('bootstrap.servers', $brokers);
        $this->producer = new Producer($conf);
        $this->producer->addBrokers($brokers);
        $this->topic = $this->producer->newTopic($topic);
    }

    protected function produce(string $message): void
    {
         try {
            $this->topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);

            $this->producer->poll(0);

            while ($this->producer->getOutQLen() > 0) {
                $this->producer->poll(50);
            }

            $this->logger->info('Notification sent successfully', [
                'message' => $message,
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Failed to send notification', [
                'exception' => $e,
                'message' => $message,
            ]);
        }
    }
}