<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class NotSuccessSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {

        return isset($response['Success']) && $response['Success'] == false;
    }
}
