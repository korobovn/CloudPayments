<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\NotMessageSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  not-message-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\NotMessageSpecification
 */
class NotMessageSpecificationTest extends TestCase
{
    /** @var NotMessageSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new NotMessageSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Message' => '',
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }

}
