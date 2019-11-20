<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\FailedTransactionsNumberInt;

/**
 * @group unit
 */
class FailedTransactionsNumberIntTest extends TestCase
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
            use FailedTransactionsNumberInt;
        };
    }

    public function test()
    {
        $this->class->setFailedTransactionsNumber($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getFailedTransactionsNumber());
    }
}
