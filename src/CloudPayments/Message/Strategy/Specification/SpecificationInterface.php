<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

interface SpecificationInterface
{
    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool;
}
