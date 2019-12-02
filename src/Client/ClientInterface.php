<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

interface ClientInterface
{
    /**
     * Sending request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface;
}
