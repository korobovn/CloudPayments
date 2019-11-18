<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class SubscriptionsSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new SubscriptionsInModelSpecification)->isSatisfiedBy($response) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
