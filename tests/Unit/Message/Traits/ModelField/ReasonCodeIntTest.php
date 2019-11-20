<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonCodeInt;

/**
 * @group unit
 */
class ReasonCodeIntTest extends TestCase
{
    protected $class;

    /** @var \Faker\Generator */
    protected $facker;

    protected function setUp(): void
{
        parent::setUp();

        $this->facker = Factory::create();

        $this->class = new class
        {
            use ReasonCodeInt;
        };
    }

    public function test()
    {
        $this->class->setReasonCode($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getReasonCode());
    }
}
