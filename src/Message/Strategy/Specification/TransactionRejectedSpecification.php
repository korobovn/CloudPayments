<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class TransactionRejectedSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['ReasonCode']) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response);
    }
}
