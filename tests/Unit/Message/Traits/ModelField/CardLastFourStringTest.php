<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardLastFourString;

/**
 * @group unit
 */
class CardLastFourStringTest extends TestCase
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
            use CardLastFourString;
        };
    }

    public function test()
    {
        $this->class->setCardLastFour($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getCardLastFour());
    }
}
