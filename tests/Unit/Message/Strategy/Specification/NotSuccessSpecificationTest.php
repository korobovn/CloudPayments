<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  not-success-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification
 */
class NotSuccessSpecificationTest extends TestCase
{
    /** @var NotSuccessSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new NotSuccessSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => false,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
