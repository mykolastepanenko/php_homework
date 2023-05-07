<?php

namespace Components\Initializers;

use Monolog\Handler\AbstractProcessingHandler;
use Psr\Log\LoggerInterface;

class MonologInitializer
{
    /**
     * @var AbstractProcessingHandler[] $handlers
     */
    protected array $handlers;

    /**
     * @param LoggerInterface $logger
     * @param ...$handlers
     */
    public function __construct(protected LoggerInterface $logger, ...$handlers)
    {
        $this->handlers = $handlers;
    }

    public function init(): void
    {
        foreach ($this->handlers as $handler) {
            $this->logger->pushHandler($handler);
        }
    }
}