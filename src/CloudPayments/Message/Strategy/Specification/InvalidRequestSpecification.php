<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class InvalidRequestSpecification extends CompositeSpecification
{
    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new NotModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->isSatisfiedBy($response);
    }
}
