<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\ResponseInterface;

interface StrategyInterface
{
    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface;
}
