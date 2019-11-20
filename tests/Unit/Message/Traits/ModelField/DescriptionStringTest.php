<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionString;

/**
 * @group unit
 */
class DescriptionStringTest extends TestCase
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
            use DescriptionString;
        };
    }

    public function test()
    {
        $this->class->setDescription($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getDescription());
    }
}
