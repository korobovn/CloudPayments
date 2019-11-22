<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class NotMessageSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return empty($response['Message']);
    }
}
