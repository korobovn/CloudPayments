<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

interface CloudPaymentClientInterface
{
    public function send(RequestInterface $request): ResponseInterface;
}
