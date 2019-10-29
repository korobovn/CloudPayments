<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\TestRequest;
use Korobovn\CloudPayments\RequestManagementStrategy\Exception\RequestManagementStrategyCannotCreateResponse;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\Response\ResponseInterface;
use Korobovn\CloudPayments\Response\TestResponse;

class TestRequestManagementStrategy extends AbstractRequestManagementStrategy
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
     * @throws RequestManagementStrategyCannotCreateResponse
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
            throw new RequestManagementStrategyCannotCreateResponse('Request management strategy cannot create a response');
        }

        return $response_interface;
    }
}
