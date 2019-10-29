<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\RequestManagementStrategy\RequestManagementStrategyInterface;
use Korobovn\CloudPayments\Response\ResponseInterface;

interface CloudPaymentClientInterface
{
    public function send(RequestManagementStrategyInterface $request_management_strategy): ResponseInterface;
}
