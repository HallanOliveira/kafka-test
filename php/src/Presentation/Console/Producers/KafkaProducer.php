<?php

namespace App\Presentation\Console\Producers;

use RdKafka\Producer;
use RdKafka\Conf;
use RdKafka\ProducerTopic;

abstract class KafkaProducer
{
    protected Producer $producer;
    protected ProducerTopic $topic;

    public function __construct(string $brokers, string $topic) {
        $conf = new Conf();
        $conf->set('bootstrap.servers', $brokers);
        $this->producer = new Producer($conf);
        $this->producer->addBrokers($brokers);
        $this->topic = $this->producer->newTopic(getenv('KAFKA_TOPIC'));
    }
}