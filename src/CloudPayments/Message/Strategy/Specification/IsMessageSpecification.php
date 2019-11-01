<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class IsMessageSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Message']);
    }
}
