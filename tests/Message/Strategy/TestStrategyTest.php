<?php

namespace Korobovn\Tests\Message\Strategy;

use Korobovn\CloudPayments\Message\Strategy\TestStrategy;
use PHPUnit\Framework\TestCase;

class TestStrategyTest extends TestCase
{
    public function test(): void
    {
        $strategy = new TestStrategy;

        $raw_response = [
            'Success' => true,
            'Message' => 'bd6353c3-0ed6-4a65-946f-083664bf8dbd',
        ];

        $response = $strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response->isSuccess());
        $this->assertSame('bd6353c3-0ed6-4a65-946f-083664bf8dbd', $response->getMessage());
    }
}
