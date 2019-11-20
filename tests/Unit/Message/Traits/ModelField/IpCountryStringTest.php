<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCountryString;

/**
 * @group unit
 */
class IpCountryStringTest extends TestCase
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
            use IpCountryString;
        };
    }

    public function test()
    {
        $this->class->setIpCountry($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getIpCountry());
    }
}
