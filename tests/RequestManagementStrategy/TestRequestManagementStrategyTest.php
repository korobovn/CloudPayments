<?php

namespace Korobovn\Tests\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\TestRequest;
use Korobovn\CloudPayments\RequestManagementStrategy\TestRequestManagementStrategy;
use PHPUnit\Framework\TestCase;

class TestRequestManagementStrategyTest extends TestCase
{
    public function test(): void
    {
        $strategy = new TestRequestManagementStrategy(new TestRequest);

        $raw_response = [
            'Success' => true,
            'Message' => 'bd6353c3-0ed6-4a65-946f-083664bf8dbd',
        ];

        $response = $strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response->isSuccess());
        $this->assertSame('bd6353c3-0ed6-4a65-946f-083664bf8dbd', $response->getMessage());
    }
}
