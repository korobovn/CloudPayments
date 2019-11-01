<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class SubscriptionSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new IsIdInModelSpecification)
            ->and(new IsSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response);
    }
}
