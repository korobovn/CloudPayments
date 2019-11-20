<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  is-success-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification
 */
class IsSuccessSpecificationTest extends TestCase
{
    /** @var IsSuccessSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new IsSuccessSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => true,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
