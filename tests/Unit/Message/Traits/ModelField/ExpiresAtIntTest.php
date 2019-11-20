<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\ExpiresAtInt;

/**
 * @group unit
 */
class ExpiresAtIntTest extends TestCase
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
            use ExpiresAtInt;
        };
    }

    public function test()
    {
        $this->class->setExpiresAt($some = $this->facker->randomNumber());

        $this->assertSame($some, $this->class->getExpiresAt());
    }
}
