<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class TransactionRejectedSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new IsReasonCodeInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response);
    }
}
