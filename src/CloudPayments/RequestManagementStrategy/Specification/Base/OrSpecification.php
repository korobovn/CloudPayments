<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy\Specification\Base;

class OrSpecification extends CompositeSpecification
{
    /** @var SpecificationInterface */
    protected $one;

    /** @var  SpecificationInterface */
    protected $other;

    /**
     * OrSpecification constructor.
     *
     * @param SpecificationInterface $one
     * @param SpecificationInterface $other
     */
    public function __construct(SpecificationInterface $one, SpecificationInterface $other)
    {
        $this->one   = $one;
        $this->other = $other;
    }

    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool
    {
        return $this->one->isSatisfiedBy($response) || $this->other->isSatisfiedBy($response);
    }
}
