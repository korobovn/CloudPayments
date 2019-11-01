<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class NotModelSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return empty($response['Model']);
    }
}
