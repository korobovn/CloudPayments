<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class IsSuccessSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Success']) && $response['Success'] == true;
    }
}
