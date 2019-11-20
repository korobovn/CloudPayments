<?php

namespace Tests\Unit\Korobovn\Tests\Unit\Message\Traits\ModelFeature;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\FillFromArray;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group fill-from-array
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Traits\ModelFeature\FillFromArray
 */
class FillFromArrayTest extends TestCase
{
    protected $class;

    protected function setUp(): void
    {
        parent::setUp();

        $this->class = new class
        {
            use FillFromArray;

            /** @var string */
            protected $test_field;

            /**
             * @param string $test_field
             *
             * @return self
             */
            public function setTestField(string $test_field): self
            {
                $this->test_field = $test_field;

                return $this;
            }

            /**
             * @return string|null
             */
            public function getTestField(): ?string
            {
                return $this->test_field;
            }
        };
    }

    public function testSuccessLoad(): void
    {

        $this->class->fillFromArray([
            'TestField'     => 'test_value',
            'UnloadedField' => 'value',
        ]);

        $this->assertSame('test_value', $this->class->getTestField());
    }

    public function testFailLoad(): void
    {

        $this->class->fillFromArray([
            'test_field' => 'test_value',
        ]);

        $this->assertSame(null, $this->class->getTestField());
    }
}
