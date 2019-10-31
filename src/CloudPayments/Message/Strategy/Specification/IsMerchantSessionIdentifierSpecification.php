<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class IsMerchantSessionIdentifierSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['merchantSessionIdentifier']);
    }
}