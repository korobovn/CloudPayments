<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaReqString;

/**
 * @group unit
 */
class PaReqStringTest extends TestCase
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
            use PaReqString;
        };
    }

    public function test()
    {
        $this->class->setPaReq($some = $this->facker->sentence);

        $this->assertSame($some, $this->class->getPaReq());
    }
}
