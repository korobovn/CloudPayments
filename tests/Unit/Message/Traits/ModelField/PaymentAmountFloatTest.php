<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaymentAmountFloat;

/**
 * @group unit
 */
class PaymentAmountFloatTest extends TestCase
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
            use PaymentAmountFloat;
        };
    }

    public function test()
    {
        $this->class->setPaymentAmount($some = $this->facker->randomFloat());

        $this->assertSame($some, $this->class->getPaymentAmount());
    }
}
