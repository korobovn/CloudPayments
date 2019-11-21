<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class InvalidRequestSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return empty($response['Model']) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response) &&
               (new IsMessageSpecification)->isSatisfiedBy($response);
    }
}
