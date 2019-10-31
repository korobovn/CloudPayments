<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification\Base;

abstract class CompositeSpecification implements SpecificationInterface
{
    /**
     * @param array $response
     *
     * @return bool
     */
    abstract public function isSatisfiedBy(array $response): bool;

    /**
     * @param SpecificationInterface $other
     *
     * @return SpecificationInterface
     */
    public function and(SpecificationInterface $other): SpecificationInterface
    {
        return new AndSpecification($this, $other);
    }

    /**
     * @param SpecificationInterface $other
     *
     * @return SpecificationInterface
     */
    public function or(SpecificationInterface $other): SpecificationInterface
    {
        return new OrSpecification($this, $other);
    }

    /**
     * @return SpecificationInterface
     */
    public function not(): SpecificationInterface
    {
        return new NotSpecification($this);
    }
}
