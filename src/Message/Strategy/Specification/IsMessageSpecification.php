<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class IsMessageSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Message']);
    }
}
