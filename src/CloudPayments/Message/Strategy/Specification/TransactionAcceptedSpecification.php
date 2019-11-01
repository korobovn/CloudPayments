<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class TransactionAcceptedSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Model']['ReasonCode']) &&
               $response['Model']['ReasonCode'] == 0 &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
