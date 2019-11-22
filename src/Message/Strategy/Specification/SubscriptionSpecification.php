<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class SubscriptionSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['Id']) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
