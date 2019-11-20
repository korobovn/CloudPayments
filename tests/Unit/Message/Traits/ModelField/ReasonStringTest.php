<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonString;

/**
 * @group unit
 */
class ReasonStringTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp()
    {
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class
        {
            use ReasonString;
        };
    }

    public function test()
    {
        $this->class->setReason($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getReason());
    }
}
