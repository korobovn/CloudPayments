<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Traits\ModelFeature;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\ToArray;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group to-array
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Traits\ModelFeature\ToArray
 */
class ToArrayTest extends TestCase
{
    protected $class;

    protected function setUp(): void
    {
        parent::setUp();

        $this->class = new class
        {
            use ToArray;

            /** @var string */
            protected $simple_string_field = 'simple_string_field_value';

            /** @var bool */
            protected $simple_bool_field = true;

            /**
             * @return string
             */
            public function getSimpleStringField(): string
            {
                return $this->simple_string_field;
            }

            /**
             * @return bool
             */
            public function isSimpleBoolField(): bool
            {
                return $this->simple_bool_field;
            }
        };
    }

    public function testSuccessLoad(): void
    {
        $result = [
            'SimpleStringField' => 'simple_string_field_value',
            'SimpleBoolField' => true,
        ];

        $this->assertSame($result, $this->class->toArray());
    }
}
