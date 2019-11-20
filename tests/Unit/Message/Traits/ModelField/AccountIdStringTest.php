<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;

/**
 * @group unit
 */
class AccountIdStringTest extends TestCase
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
            use AccountIdString;
        };
    }

    public function test()
    {
        $this->class->setAccountId($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getAccountId());
    }
}
