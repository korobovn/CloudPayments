<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class ApplePayStartSessionCorrectSpecification extends CompositeSpecification
{
    public function isSatisfiedBy(array $response): bool
    {
        return (new IsMerchantSessionIdentifierSpecification)
            ->and(new IsSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response);
    }
}
