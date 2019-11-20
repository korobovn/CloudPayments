<?php

namespace Korobovn\Tests\Unit\Message\Traits\ModelField;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Traits\ModelField\RequireConfirmationBoolNull;

/**
 * @group unit
 */
class RequireConfirmationBoolNullTest extends TestCase
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
            use RequireConfirmationBoolNull;
        };
    }

    public function test()
    {
        $this->class->setRequireConfirmation($some = $this->facker->boolean);

        $this->assertSame($some, $this->class->isRequireConfirmation());
    }
}
