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
     * @param array $response
     *
     * @return TestResponse
     * @throws RequestManagementStrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $response): ResponseInterface
    {
        if ((new IsSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->and(new NotModelSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new TestResponse($response['Message']);
        } else {
            throw $this->throwCannotCreateResponseException($response);
        }

        return $response_interface;
    }
}
