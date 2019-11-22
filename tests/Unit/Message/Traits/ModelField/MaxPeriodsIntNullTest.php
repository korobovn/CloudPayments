<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;

/**
 * @group unit
 */
class MaxPeriodsIntNullTest extends TestCase
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
            use MaxPeriodsIntNull;
        };
    }

    public function test()
    {
        $this->class->setMaxPeriods($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getMaxPeriods());
    }
}
