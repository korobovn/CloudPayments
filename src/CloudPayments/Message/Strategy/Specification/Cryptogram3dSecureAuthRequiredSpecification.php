<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class Cryptogram3dSecureAuthRequiredSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['AcsUrl']) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
