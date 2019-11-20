<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\IntervalCodeInt;

/**
 * @group unit
 */
class IntervalCodeIntTest extends TestCase
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
            use IntervalCodeInt;
        };
    }

    public function test()
    {
        $this->class->setIntervalCode($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getIntervalCode());
    }
}
