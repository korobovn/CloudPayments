<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;

/**
 * @group unit
 */
class DescriptionStringNullTest extends TestCase
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
            use DescriptionStringNull;
        };
    }

    public function test()
    {
        $this->class->setDescription($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getDescription());
    }
}
