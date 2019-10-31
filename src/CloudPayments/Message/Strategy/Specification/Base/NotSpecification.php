<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification\Base;

class NotSpecification extends CompositeSpecification
{
    /** @var SpecificationInterface */
    protected $one;

    /**
     * NotSpecification constructor.
     *
     * @param SpecificationInterface $one
     */
    public function __construct(SpecificationInterface $one)
    {
        $this->one = $one;
    }

    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! $this->one->isSatisfiedBy($response);
    }
}
