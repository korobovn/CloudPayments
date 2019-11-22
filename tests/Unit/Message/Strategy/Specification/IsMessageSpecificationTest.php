<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  is-message-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification
 */
class IsMessageSpecificationTest extends TestCase
{
    /** @var IsMessageSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new IsMessageSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Message' => 'Any message',
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }

}
