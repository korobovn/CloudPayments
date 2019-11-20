<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\TestModeBool;

/**
 * @group unit
 */
class TestModeBoolTest extends TestCase
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
            use TestModeBool;
        };
    }

    public function test()
    {
        $this->class->setTestMode($some = $this->facker->boolean);

        $this->assertSame($some, $this->class->isTestMode());
    }
}
