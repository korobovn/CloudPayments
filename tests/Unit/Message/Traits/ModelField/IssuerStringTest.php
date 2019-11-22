<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerString;

/**
 * @group unit
 */
class IssuerStringTest extends TestCase
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
            use IssuerString;
        };
    }

    public function test()
    {
        $this->class->setIssuer($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getIssuer());
    }
}
