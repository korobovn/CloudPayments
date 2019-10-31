<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class ZeroReasonCodeInModelSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Model']['ReasonCode']) && $response['Model']['ReasonCode'] == 0;
    }
}
