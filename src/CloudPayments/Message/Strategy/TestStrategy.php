<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\TestRequest;
use Korobovn\CloudPayments\Message\Strategy\Exception\RequestManagementStrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Response\TestResponse;

class TestStrategy extends AbstractStrategy
{
    /**
     * TestRequestManagementStrategy constructor.
     *
     * @param TestRequest $request
     */
    public function __construct(TestRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param array $raw_response
     *
     * @return TestResponse
     * @throws RequestManagementStrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface
    {
        if ((new IsSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->and(new NotModelSpecification)
            ->isSatisfiedBy($raw_response)
        ) {
            $response_interface = new TestResponse;
            $response_interface->createFromArray($raw_response);
        } else {
            throw $this->throwCannotCreateResponseException($raw_response);
        }

        return $response_interface;
    }
}
