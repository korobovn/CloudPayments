<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

interface StrategyInterface
{
    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface;

    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface;
}
