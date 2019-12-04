<?php

namespace App\Logging;

use Google\Cloud\Logging\LoggingClient;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;

class CreateStackdriverLogger
{
    public function __invoke(array $config)
    {
        $logName = isset($config['logName']) ? $config['logName'] : 'app';
        $psrLogger = LoggingClient::psrBatchLogger($logName);
        $handler = new PsrHandler($psrLogger);
        $logger = new Logger($logName, [$handler]);
        return $logger;
    }
}
