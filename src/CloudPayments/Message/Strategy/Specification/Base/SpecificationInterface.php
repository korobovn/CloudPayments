<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification\Base;

interface SpecificationInterface
{
    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool;

    /**
     * @param SpecificationInterface $other
     *
     * @return SpecificationInterface
     */
    public function and(SpecificationInterface $other): SpecificationInterface;

    /**
     * @param SpecificationInterface $other_specification
     *
     * @return SpecificationInterface
     */
    public function or(SpecificationInterface $other_specification): SpecificationInterface;

    /**
     * @return SpecificationInterface
     */
    public function not(): SpecificationInterface;
}
