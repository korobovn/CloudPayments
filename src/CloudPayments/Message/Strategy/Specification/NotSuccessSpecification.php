<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class NotSuccessSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Success']) && $response['Success'] == false;
    }
}
