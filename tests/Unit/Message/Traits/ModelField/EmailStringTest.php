<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailString;

/**
 * @group unit
 */
class EmailStringTest extends TestCase
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
            use EmailString;
        };
    }

    public function test()
    {
        $this->class->setEmail($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getEmail());
    }
}
