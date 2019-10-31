<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Strategy\Exception\RequestManagementStrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     */
    abstract public function prepareRawResponse(array $raw_response): ResponseInterface;

    /**
     * @param array $response
     *
     * @return RequestManagementStrategyCannotCreateResponseException
     */
    protected function throwCannotCreateResponseException(array $response): RequestManagementStrategyCannotCreateResponseException
    {
        /**
         * @todo can do logging $response
         */
        return new RequestManagementStrategyCannotCreateResponseException(
            sprintf('Request management strategy %s cannot create a response',
                static::class
            )
        );
    }
}
