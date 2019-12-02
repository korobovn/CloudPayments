<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\Exception\ClassNotFoundException;
use Korobovn\CloudPayments\Message\Strategy\Exception\IsNotInstanceOfException;
use Korobovn\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;

interface StrategyInterface
{
    /**
     * Converts raw response to `ResponseInterface`
     *
     * @param array $raw_response
     *
     * @return ResponseInterface
     *
     * @throws StrategyCannotCreateResponseException
     * @throws IsNotInstanceOfException
     * @throws ClassNotFoundException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface;
}
