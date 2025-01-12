<?php

namespace App\Logging;

use Monolog\Level;
use Monolog\Processor\IntrospectionProcessor;

class LogsFormatter
{
    public function __invoke($logger): void
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor(new IntrospectionProcessor(Level::Debug, ['Illuminate']));
        }
    }
}