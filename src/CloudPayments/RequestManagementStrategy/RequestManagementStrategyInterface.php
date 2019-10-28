<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\RequestInterface;
use Korobovn\CloudPayments\Response\ResponseInterface;

interface RequestManagementStrategyInterface
{
    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface;

    /**
     * @param array $response
     *
     * @return ResponseInterface
     */
    public function prepareRawResponse(array $response): ResponseInterface;
}
