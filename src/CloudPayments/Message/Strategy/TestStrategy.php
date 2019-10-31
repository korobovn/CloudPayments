<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Response\TestResponse;

class TestStrategy extends AbstractStrategy
{
    /**
     * @param array $raw_response
     *
     * @return TestResponse
     * @throws StrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface
    {
        if ((new IsSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->and(new NotModelSpecification)
            ->isSatisfiedBy($raw_response)
        ) {
            $response_interface = new TestResponse;
            $response_interface->fillFromArray($raw_response);
        } else {
            throw $this->throwCannotCreateResponseException($raw_response);
        }

        return $response_interface;
    }
}
