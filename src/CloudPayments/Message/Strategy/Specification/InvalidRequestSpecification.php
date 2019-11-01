<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class InvalidRequestSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new NotModelSpecification)->isSatisfiedBy($response) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response) &&
               (new IsMessageSpecification)->isSatisfiedBy($response);
    }
}
