<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

interface CloudPaymentClientInterface
{
    public function send(StrategyInterface $request_management_strategy): ResponseInterface;
}
