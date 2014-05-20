<?php

/**
 * Symfony service to wrap curl calls
 * @author vdegroote
 */
namespace CanalTP\MttBundle\Services\Amqp;

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Channel
{
    const EXCHANGE_NAME = "pdf_gen_exchange";
    const PDF_GEN_QUEUE_NAME = "pdf_gen_queue";
    
    private $connection = null;
    private $channel = null;
    
    public function __construct(
        $amqpServerHost, 
        $user, 
        $pass, 
        $port, 
        $vhost
    )
    {
        $this->connection = new AMQPConnection($amqpServerHost, $port, $user, $pass, $vhost);
        
    }
    
    private function init()
    {
        if (empty($this->channel)) {
            $this->channel = $this->connection->channel();

            $this->channel->exchange_declare($this->getExchangeName(), 'topic', false, true, false);
        }
    }
    
    public function getChannel()
    {
        $this->init();
        return $this->channel;
    }

    public function getAckQueueName()
    {
        return 'ack_queue.for_pdf_gen';
    }

    public function getRoutingKey($season, $task)
    {
        return 'network_' . $season->getNetwork()->getId() . '_task_' . $task->getId() .'.pdf_gen';
    }
    
    public function getExchangeName()
    {
        return self::EXCHANGE_NAME;
    }
    
    public function getPdfGenQueueName()
    {
        return self::PDF_GEN_QUEUE_NAME;
    }

    public function close()
    {
        $this->channel->close();
        $this->connection->close();
    }
}