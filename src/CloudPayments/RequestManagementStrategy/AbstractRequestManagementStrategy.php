<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\RequestInterface;
use Korobovn\CloudPayments\RequestManagementStrategy\Exception\RequestManagementStrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Response\ResponseInterface;

abstract class AbstractRequestManagementStrategy implements RequestManagementStrategyInterface
{
    /** @var RequestInterface */
    protected $request;

    /**
     * AbstractRequestManagementStrategy constructor.
     *
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @param array $response
     *
     * @return ResponseInterface
     */
    abstract public function prepareRawResponse(array $response): ResponseInterface;

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
