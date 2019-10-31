<?php

namespace Korobovn\Tests\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    public function testModelAndSuccess(): void
    {
        $response = [
            'Model'   => [
                'some' => 'model',
            ],
            'Success' => true,
        ];

        $this->assertTrue(
            (new IsModelSpecification)
                ->and(new IsSuccessSpecification)
                ->isSatisfiedBy($response)
        );
    }

    public function testModelAndNotSuccess(): void
    {
        $response = [
            'Model'   => [
                'some' => 'model',
            ],
            'Success' => false,
        ];

        $this->assertTrue(
            (new IsModelSpecification)
                ->and((new IsSuccessSpecification)->not())
                ->isSatisfiedBy($response)
        );
    }

    public function testNotModelAndNotSuccessAndIsMessage(): void
    {
        $response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $this->assertTrue(
            (new NotModelSpecification)
                ->and(new NotSuccessSpecification)
                ->and(new IsMessageSpecification)
                ->isSatisfiedBy($response)
        );
    }
}
