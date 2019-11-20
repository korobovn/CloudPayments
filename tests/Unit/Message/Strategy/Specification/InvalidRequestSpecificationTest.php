<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  invalid-request-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification
 */
class InvalidRequestSpecificationTest extends TestCase
{
    /** @var InvalidRequestSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new InvalidRequestSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
