<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;

/**
 * @group unit
 */
class CurrencyStringTest extends TestCase
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
            use CurrencyString;
        };
    }

    public function test()
    {
        $this->class->setCurrency($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCurrency());
    }
}