<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class TransactionAcceptedSpecification extends CompositeSpecification
{
    public function isSatisfiedBy(array $response): bool
    {
        return (new ZeroReasonCodeInModelSpecification)
            ->and(new IsSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response);
    }
}
