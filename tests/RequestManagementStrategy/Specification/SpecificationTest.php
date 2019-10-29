<?php

namespace Korobovn\Tests\RequestManagementStrategy\Specification;

use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotSuccessSpecification;
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
