<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloatNull;

/**
 * @group unit
 */
class AmountFloatNullTest extends TestCase
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
            use AmountFloatNull;
        };
    }

    public function test()
    {
        $this->class->setAmount($some = $this->facker->randomFloat());

        $this->assertSame($some, $this->class->getAmount());
    }
}
