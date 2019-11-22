<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateString;

/**
 * @group unit
 */
class AuthDateStringTest extends TestCase
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
            use AuthDateString;
        };
    }

    public function test()
    {
        $this->class->setAuthDate($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getAuthDate());
    }
}
