<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\EpochTimestampInt;

/**
 * @group unit
 */
class EpochTimestampIntTest extends TestCase
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
            use EpochTimestampInt;
        };
    }

    public function test()
    {
        $this->class->setEpochTimestamp($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getEpochTimestamp());
    }
}
